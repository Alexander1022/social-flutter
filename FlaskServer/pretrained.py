from flask import Flask, request, jsonify
import torch
import json
from torchvision import transforms
from torchvision.models import resnet18
from PIL import Image
from utils import load_model
import io
import os
from functools import wraps
import hmac
from dotenv import load_dotenv

load_dotenv()

app = Flask(__name__)
app.config['API_KEY'] = os.environ.get('API_KEY') 

class_idx_to_species_id, species_id_to_name = None, None
model = None
device = torch.device("cuda" if torch.cuda.is_available() else "cpu")


def initialize_service():
    global class_idx_to_species_id, species_id_to_name, model

    # Load class mappings
    with open('class_idx_to_species_id.json', 'r') as f:
        class_idx_to_species_id = json.load(f)
    with open('plantnet300K_species_id_2_name.json', 'r') as f:
        species_id_to_name = json.load(f)

    # Load model
    filename = 'resnet18_weights_best_acc.tar'
    model = resnet18(num_classes=1081)
    load_model(model, filename=filename, use_gpu=(device.type == "cuda"))
    model.to(device)
    model.eval()


# Initialize the service when app starts
initialize_service()

# Preprocessing transform
transform = transforms.Compose([
    transforms.Resize(256),
    transforms.CenterCrop(224),
    transforms.ToTensor(),
    transforms.Normalize(mean=[0.485, 0.456, 0.406], std=[0.229, 0.224, 0.225]),
])

def require_api_key(f):
    @wraps(f)
    def decorated(*args, **kwargs):
        provided_key = request.headers.get('X-API-Key')

        if not hmac.compare_digest(provided_key or '', app.config['API_KEY'] or ''):
            return jsonify({"error": "Unauthorized", "message": "Do you even have our secret key?"}), 401
            
        return f(*args, **kwargs)
    return decorated

@app.route('/health', methods=['GET'])
def health():
    return jsonify({'status': 'ok', 'do-i-love-butterflies': 'yes'})

@app.route('/predict', methods=['POST'])
@require_api_key
def predict():
    if 'file' not in request.files:
        return jsonify({'error': 'No file uploaded'}), 400

    file = request.files['file']
    if file.filename == '':
        return jsonify({'error': 'Empty filename'}), 400

    try:
        # Read and preprocess image
        image_bytes = file.read()
        image = Image.open(io.BytesIO(image_bytes)).convert("RGB")
        input_tensor = transform(image).unsqueeze(0).to(device)

        # Run inference
        with torch.no_grad():
            output = model(input_tensor)
            probabilities = torch.nn.functional.softmax(output[0], dim=0)

        # Get prediction
        predicted_class_idx = torch.argmax(probabilities).item()
        confidence = probabilities[predicted_class_idx].item()
        species_id = class_idx_to_species_id.get(str(predicted_class_idx), "Unknown")
        species_name = species_id_to_name.get(str(species_id), "Unknown")

        return jsonify({
            'species_name': species_name,
            'confidence': float(confidence),
            'success': True
        })

    except Exception as e:
        return jsonify({
            'error': str(e),
            'success': False
        }), 500


if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=False)
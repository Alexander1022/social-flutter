// Upload.tsx
import { useLocation, useNavigate } from 'react-router-dom';
import { useState, useEffect } from 'react';

export default function Upload() {
  const location = useLocation();
  const navigate = useNavigate();
  const [selectedCategory, setSelectedCategory] = useState('');
  const imageData = location.state?.imageData;

  // Mock data
  const mockSpeciesInfo = {
    animal: {
      name: "African Elephant",
      percentage: "78%",
      fact: "African elephants are the largest land animals on Earth."
    },
    plant: {
      name: "Baobab Tree",
      percentage: "63%",
      fact: "Baobab trees can live for over 3,000 years."
    },
    mushroom: {
      name: "Fly Agaric",
      percentage: "42%",
      fact: "This iconic mushroom is known for its hallucinogenic properties."
    }
  };

  useEffect(() => {
    if (!imageData) {
      navigate('/');
    }
  }, [imageData, navigate]);

  const handleSubmit = () => {
    navigate('/details', { 
      state: { 
        imageData,
        category: selectedCategory,
        speciesInfo: mockSpeciesInfo[selectedCategory as keyof typeof mockSpeciesInfo]
      }
    });
  };

  return (
    <div className="min-h-screen p-8">
      <div className="max-w-4xl mx-auto">
        <div className="grid md:grid-cols-2 gap-8">
          <div className="bg-white rounded-lg shadow-lg p-4">
            {imageData && (
              <img 
                src={imageData} 
                alt="Uploaded content" 
                className="w-full h-64 object-contain mb-4"
              />
            )}
            <div className="space-y-4">
              <button
                onClick={() => setSelectedCategory('animal')}
                className="w-full py-3 px-6 bg-emerald-300 text-white rounded-lg hover:bg-purple-700 transition-colors"
              >
                Animal
              </button>
              <button
                onClick={() => setSelectedCategory('plant')}
                className="w-full py-3 px-6 bg-emerald-400 text-white rounded-lg hover:bg-green-700 transition-colors"
              >
                Plant
              </button>
              <button
                onClick={() => setSelectedCategory('mushroom')}
                className="w-full py-3 px-6 bg-emerald-500 text-white rounded-lg hover:bg-orange-700 transition-colors"
              >
                Mushroom
              </button>
              
              {selectedCategory && (
                <button
                  onClick={handleSubmit}
                  className="w-full py-3 px-6 bg-emerald-600 text-white rounded-lg hover:bg-purple-700 transition-colors mt-4"
                >
                  Submit Classification
                </button>
              )}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
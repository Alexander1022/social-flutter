import { useLocation, useNavigate } from 'react-router';
import { useEffect } from 'react';

export default function Details() {
  const location = useLocation();
  const navigate = useNavigate();
  const { imageData, category, speciesInfo } = location.state || {};

  console.log('info', speciesInfo);
  useEffect(() => {
    if (!imageData || !speciesInfo) {
      navigate('/');
    }
  }, [imageData, speciesInfo, navigate]);

  return (
    <div className="min-h-screen p-8">
      <div className="max-w-4xl mx-auto">
        
        <div className="grid md:grid-cols-2 gap-8">
          <div className="bg-white rounded-lg shadow-lg p-4">
            {imageData && (
              <img 
                src={imageData} 
                alt="Classified content" 
                className="w-full h-64 object-contain mb-4"
              />
            )}
          </div>
          
          <div className="bg-white rounded-lg shadow-lg p-4">
            <h2 className="text-xl font-semibold mb-4">Analysis Details</h2>
            <div className="space-y-4">
              <div className="bg-emerald-50 p-4 rounded-lg">
                <p className="font-medium text-emerald-600">Species Identification:</p>
                <p className="text-lg">{speciesInfo?.scientificName}</p>
              </div>

              <div className="bg-teal-50 p-4 rounded-lg">
                <p className="font-medium text-emerald-600">Common name:</p>
                <p className="text-lg">{speciesInfo?.commonName}</p>
              </div>
              
              <div className="bg-emerald-50 p-4 rounded-lg">
                <p className="font-medium text-teal-600">User Consensus:</p>
                <p className="text-lg">{speciesInfo?.percentage} of users have seen this</p>
              </div>
              
              <div className="bg-teal-50 p-4 rounded-lg">
                <p className="font-medium text-emerald-600">Interesting Fact:</p>
                <p className="text-gray-700">{speciesInfo?.funFact}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}
import { useLocation, useNavigate } from "react-router";
import { useState, useEffect } from "react";
import { Loader2 } from "lucide-react";
import axios from "axios";
import { Buffer } from "buffer";

export default function Upload() {
  const location = useLocation();
  const navigate = useNavigate();
  const [selectedCategory, setSelectedCategory] = useState("");
  const [isLoading, setIsLoading] = useState(false);
  const [error, setError] = useState("");

  const imageData = location.state?.imageData;
  const imageCoordinates = location.state?.coordinates;

  const mockSpeciesInfo = {
    animal: {
      name: "African Elephant",
      percentage: "78%",
      fact: "African elephants are the largest land animals on Earth.",
    },
    plant: {
      name: "Baobab Tree",
      percentage: "63%",
      fact: "Baobab trees can live for over 3,000 years.",
    },
    mushroom: {
      name: "Fly Agaric",
      percentage: "42%",
      fact: "This iconic mushroom is known for its hallucinogenic properties.",
    },
  };

  useEffect(() => {
    if (!imageData) navigate("/");
  }, [imageData, imageCoordinates, navigate]);

  const handleSubmit = async () => {
    try {
      setIsLoading(true);
      setError("");
      const base64Data = imageData.split(",")[1];
      const buffer = Buffer.from(base64Data, 'base64');
      const file = new File([buffer], 'upload.jpg', {
        type: 'image/jpeg'
      });
      
      const formData = new FormData();
      formData.append('lat', imageCoordinates[0]);
      formData.append('lng', imageCoordinates[1]);
      formData.append('images[0]', file);
      
      const response = await axios.post(
        `${import.meta.env.VITE_SERVER_ENDPOINT}/api/locations`,
        formData,
        {
          headers: {
            'Content-Type': 'multipart/form-data',
            Authorization: `Bearer ${localStorage.getItem("authToken")}`,
          },
        }
      );
      if (response.status === 201) {
        navigate("/details", {
          state: {
            imageData,
            category: selectedCategory,
            speciesInfo:
              mockSpeciesInfo[selectedCategory as keyof typeof mockSpeciesInfo],
          },
        });
      }
    } catch (error: any) {
      setError(error.response.data.message);
      console.error(error);
    }

    setIsLoading(false);
  };

  return (
    <div className="min-h-screen p-4 sm:p-6 lg:p-8 pb-20 lg:pb-8">
      <div className="max-w-4xl mx-auto">
        <div className="grid lg:grid-cols-2 gap-6 lg:gap-8">
          <div className="bg-white rounded-xl shadow-xs border border-gray-100 p-4 sm:p-6 transition-all duration-300 hover:shadow-sm">
            {imageData && (
              <div className="relative aspect-square overflow-hidden rounded-lg bg-gray-50">
                <img
                  src={imageData}
                  alt="Uploaded content"
                  className="w-full h-full object-contain object-center transition-transform duration-300 hover:scale-105"
                  loading="lazy"
                />
                <div className="absolute inset-0 bg-gradient-to-t from-black/5 to-transparent pointer-events-none" />
              </div>
            )}
          </div>

          <div className="bg-white rounded-xl shadow-xs border border-gray-100 p-4 sm:p-6 flex flex-col justify-between">
            <div className="space-y-4 sm:space-y-6">
              <h2 className="text-lg sm:text-xl font-semibold text-gray-900">
                What are we identifying?
              </h2>

              <div className="grid gap-2.5 sm:gap-3">
                {["animal", "plant", "mushroom"].map((category) => (
                  <button
                    key={category}
                    onClick={() => setSelectedCategory(category)}
                    className={`
                      w-full py-3 sm:py-3.5 px-4 sm:px-6 rounded-lg 
                      transition-all duration-200 border-2 text-left
                      text-sm sm:text-base font-medium
                      ${
                        selectedCategory === category
                          ? "border-emerald-600 bg-emerald-600 text-white shadow-sm"
                          : "border-gray-200 bg-white text-gray-700 hover:border-emerald-400"
                      }
                      ${isLoading ? "opacity-75 cursor-not-allowed" : ""}
                    `}
                    disabled={isLoading}
                  >
                    {category.charAt(0).toUpperCase() + category.slice(1)}
                  </button>
                ))}
              </div>
            </div>

            {selectedCategory && (
              <div className="sticky bottom-0 mt-6 pt-4 bg-white border-t border-gray-100 lg:border-none">
                <button
                  onClick={handleSubmit}
                  disabled={isLoading}
                  className={`
                        w-full py-3 sm:py-3.5 px-6 bg-emerald-600 hover:bg-emerald-700 
                        text-white rounded-lg transition-all duration-200
                    text-sm sm:text-base font-medium
                        ${
                          isLoading
                            ? "cursor-not-allowed opacity-90"
                            : "hover:shadow-sm"
                        }
                    `}
                >
                  {isLoading ? (
                    <div className="flex items-center justify-center gap-2">
                      <Loader2 className="w-4 h-4 sm:w-5 sm:h-5 animate-spin" />
                      <span>Analyzing...</span>
                    </div>
                  ) : (
                    <>
                      <span className="lg:hidden">Submit</span>
                      <span className="hidden lg:inline">
                        Submit Identification
                      </span>
                    </>
                  )}
                </button>
              </div>
            )}
          </div>
        </div>
      </div>
      
    </div>
  );
}

import { useEffect, useState } from "react";
import {
  Camera,
  Trophy,
  CheckCircle,
  Star,
  ChevronDown,
  X,
} from "lucide-react";
import { useAuth } from "../auth/AuthContext";
import UserAvatar from "../assets/default-avatar.svg";
import axios from "axios";
import Butter1 from "../assets/butterflies/1.png";
import Butter2 from "../assets/butterflies/2.png";
import Butter3 from "../assets/butterflies/3.png";
import Butter4 from "../assets/butterflies/4.png";
import Butter5 from "../assets/butterflies/5.png";

interface Photo {
  id: string;
  imageUrl: string;
  date: Date;
  contentText: string;
  altText: string;
}

export default function ProfilePage() {
  const [visiblePhotos, setVisiblePhotos] = useState(6);
  const [visibleQuests, setVisibleQuests] = useState(2);
  const [selectedPhoto, setSelectedPhoto] = useState<Photo | null>(null);
  const { user } = useAuth();
  const butterflyImages = [Butter1, Butter2, Butter3, Butter4, Butter5];

  const calculateLevel = (xp: number): number => {
    return Math.floor(Math.sqrt(xp / 100));
  };

  function calculateXpForLevel(level: number) {
    return level * level * 100;
  }

  const currentLevel = calculateLevel(user?.data?.xp || 0);
  const xpForCurrentLevel = calculateXpForLevel(currentLevel);
  const xpToNextLevel = calculateXpForLevel(currentLevel + 1) - user?.data?.xp;
  const butterflyIndex = Math.max(currentLevel - 1, 0) % butterflyImages.length;

  const [userPhotos, setUserPhotos] = useState<Photo[]>([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    const fetchLocations = async () => {
      try {
        const response = await axios.get(
          `${import.meta.env.VITE_SERVER_ENDPOINT}/api/user/my-locations`,
          {
            headers: {
              "ngrok-skip-browser-warning": "please-ngrok-we-love-you",
              Authorization: `Bearer ${localStorage.getItem("authToken")}`,
            },
          }
        );

        const responseData = response.data;
        const formattedData = responseData.data.map((loc: any) => {
          const specieName = loc.specie?.common_name || "Unknown species";
          const firstImage = loc.image_urls[0]?.url;

          return {
            id: loc.id,
            imageUrl: firstImage,
            date: new Date(loc.created_at),
            contentText: loc?.specie?.scientific_name,
            altText: `Photo of ${specieName}`,
          } as Photo;
        });

        setUserPhotos(formattedData);
        setError(null);
      } catch (err) {
        if (axios.isAxiosError(err)) {
          const message = err.response?.data?.message || err.message;
          setError(`API Error: ${message}`);
        } else {
          setError(err instanceof Error ? err.message : "Unknown error");
        }
      } finally {
        setLoading(false);
      }
    };

    fetchLocations();
  }, []);

  const completedQuests = [
    {
      title: "Daily Quest",
      speciesFound: ["African Elephant", "Baobab Tree"],
      rewardEarned: 500,
    },
  ];

  return (
    <div className="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
      <div className="max-w-6xl mx-auto">
        {loading && (
          <div className="absolute inset-0 bg-gray-500/50 flex items-center justify-center z-50">
            <div className="text-white text-xl">Loading map data...</div>
          </div>
        )}

        <div className="bg-white rounded-xl shadow-sm p-6 mb-6 lg:mb-8">
          <div className="grid grid-cols-1 md:grid-cols-[1fr_auto] gap-6">
            <div className="flex flex-col gap-6">
              <div className="flex items-center gap-6">
                <div className="relative group">
                  <img
                    src={user?.data?.avatarUrl || UserAvatar}
                    alt="Profile"
                    className="w-24 h-24 rounded-full object-cover border-4 border-emerald-100"
                  />
                  <div className="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-emerald-600 text-white px-3 py-1 rounded-full text-sm flex items-center gap-1">
                    <Star className="w-4 h-4 fill-current" />
                    <span>{user?.data?.xp}</span>
                  </div>
                </div>
                <div className="flex-1">
                  <h1 className="text-2xl sm:text-3xl font-bold text-gray-900 mb-1">
                    {user?.data?.name}
                  </h1>
                  <p className="text-gray-600 mb-3">{user?.data?.email}</p>
                </div>
              </div>

              <div className="space-y-2">
                <div className="flex items-center gap-4 text-sm sm:text-base">
                  <div className="flex items-center gap-2 text-emerald-600">
                    <Camera className="w-5 h-5" />
                    <span>{userPhotos.length} Observations</span>
                  </div>
                  <div className="flex items-center gap-2 text-purple-600">
                    <Trophy className="w-5 h-5" />
                    <span>{user?.data?.xp} XP</span>
                  </div>
                </div>
                <div className="pt-2 max-w-md">
                  <div className="flex justify-between text-sm text-gray-600 mb-1">
                    <span>Lv. {currentLevel}</span>
                    <span>Lv. {currentLevel + 1}</span>
                  </div>
                  <div className="w-full bg-gray-200 rounded-full h-2.5">
                    <div
                      className="bg-emerald-500 h-2.5 rounded-full transition-all duration-500"
                      style={{ width: `${(xpForCurrentLevel / 1000) * 100}%` }}
                    />
                  </div>
                  <p className="text-right text-sm text-gray-600 mt-1">
                    {xpToNextLevel} XP to next level
                  </p>
                </div>
              </div>
            </div>

            <div className="relative flex items-center justify-center">
              <img
                src={butterflyImages[butterflyIndex]}
                alt="Butterfly Badge"
                className="w-64 h-64 object-contain animate-bounce"
              />
              <div
                className="absolute w-1 h-2 bg-blue-300 rounded-full sparkle"
                style={
                  {
                    top: "10%",
                    left: "20%",
                    animationDelay: "0s",
                    "--dx": "-20px",
                    "--dy": "-20px",
                  } as any
                }
              ></div>
              <div
                className="absolute w-1 h-2 bg-blue-300 rounded-full sparkle"
                style={
                  {
                    top: "30%",
                    left: "80%",
                    animationDelay: "0.3s",
                    "--dx": "20px",
                    "--dy": "-20px",
                  } as any
                }
              ></div>
              <div
                className="absolute w-1 h-2 bg-blue-300 rounded-full sparkle"
                style={
                  {
                    top: "70%",
                    left: "30%",
                    animationDelay: "0.6s",
                    "--dx": "-15px",
                    "--dy": "15px",
                  } as any
                }
              ></div>
              <div
                className="absolute w-1 h-2 bg-blue-300 rounded-full sparkle"
                style={
                  {
                    top: "50%",
                    left: "60%",
                    animationDelay: "0.9s",
                    "--dx": "15px",
                    "--dy": "15px",
                  } as any
                }
              ></div>
              <div
                className="absolute w-1 h-2 bg-blue-300 rounded-full sparkle"
                style={
                  {
                    top: "20%",
                    left: "50%",
                    animationDelay: "1.2s",
                    "--dx": "0px",
                    "--dy": "-25px",
                  } as any
                }
              ></div>
              <div
                className="absolute w-1 h-2 bg-blue-300 rounded-full sparkle"
                style={
                  {
                    top: "80%",
                    left: "70%",
                    animationDelay: "1.5s",
                    "--dx": "25px",
                    "--dy": "0px",
                  } as any
                }
              ></div>
            </div>
          </div>
        </div>

        <div className="grid lg:grid-cols-2 gap-6 lg:gap-8">
          <div className="bg-white rounded-xl shadow-sm p-6">
            <h2 className="text-xl font-semibold mb-4 flex items-center gap-2">
              <Camera className="w-6 h-6 text-emerald-600" />
              Recent Observations
            </h2>
            <div className="grid grid-cols-2 sm:grid-cols-3 gap-3">
              {userPhotos.slice(0, visiblePhotos).map((photo) => (
                <div
                  key={photo.id}
                  className="relative group aspect-square"
                  onClick={() => setSelectedPhoto(photo)}
                >
                  <img
                    src={photo.imageUrl}
                    alt={photo.altText}
                    className="w-full h-full object-cover rounded-lg transition-transform group-hover:scale-105"
                  />
                  <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent rounded-lg p-3 flex items-end opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div className="text-white w-full">
                      <p className="text-sm font-medium mb-1">
                        {photo.contentText}
                      </p>
                      <p className="text-xs opacity-90">
                        {photo.date.toLocaleDateString("en-US", {
                          year: "numeric",
                          month: "short",
                          day: "numeric",
                        })}
                      </p>
                    </div>
                  </div>
                </div>
              ))}
            </div>
            {visiblePhotos < userPhotos.length && (
              <div className="mt-4 flex justify-center">
                <button
                  onClick={() => setVisiblePhotos((prev) => prev + 6)}
                  className="flex items-center gap-2 text-emerald-600 hover:text-emerald-700 transition-colors font-medium"
                >
                  <ChevronDown className="w-5 h-5" />
                  View More Observations
                </button>
              </div>
            )}
          </div>

          <div className="bg-white rounded-xl shadow-sm p-6">
            <h2 className="text-xl font-semibold mb-4 flex items-center gap-2">
              <Trophy className="w-6 h-6 text-purple-600" />
              Completed Quests
            </h2>
            <div className="space-y-4">
              {completedQuests.slice(0, visibleQuests).map((quest, index) => (
                <div
                  key={index}
                  className="bg-emerald-50 rounded-lg p-4 border border-emerald-100"
                >
                  <div className="flex justify-between items-start mb-2">
                    <div className="flex items-center gap-2">
                      <CheckCircle className="w-5 h-5 text-emerald-600" />
                      <h3 className="font-medium text-gray-900">
                        {quest.title}
                      </h3>
                    </div>
                  </div>
                  <div className="ml-7">
                    <div className="mb-2">
                      <p className="text-sm font-medium text-gray-600">
                        Species Discovered:
                      </p>
                      <div className="flex flex-wrap gap-2 mt-1">
                        {quest.speciesFound.map((species, i) => (
                          <span
                            key={i}
                            className="px-2 py-1 bg-white text-sm rounded-full border border-emerald-200"
                          >
                            {species}
                          </span>
                        ))}
                      </div>
                    </div>
                    <div className="flex justify-between items-center">
                      <p className="text-sm text-gray-600">
                        Earned:
                        <span className="ml-1 font-medium text-emerald-700">
                          {quest.rewardEarned} XP
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
              ))}
            </div>
            {visibleQuests < completedQuests.length && (
              <div className="mt-4 flex justify-center">
                <button
                  onClick={() => setVisibleQuests((prev) => prev + 2)}
                  className="flex items-center gap-2 text-purple-600 hover:text-purple-700 transition-colors font-medium"
                >
                  <ChevronDown className="w-5 h-5" />
                  View More Quests
                </button>
              </div>
            )}
            {error && (
              <div className="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-600">
                Error loading locations: {error}
              </div>
            )}
          </div>
        </div>

        {selectedPhoto && (
          <div className="fixed inset-0 bg-black/70 flex items-center justify-center p-4 z-50">
            <div className="bg-white rounded-lg p-6 max-w-lg w-full relative">
              <button
                className="absolute top-3 right-3 text-gray-600 hover:text-gray-800"
                onClick={() => setSelectedPhoto(null)}
              >
                <X className="w-6 h-6" />
              </button>
              <img
                src={selectedPhoto.imageUrl}
                alt={selectedPhoto.altText}
                className="w-full h-auto rounded-md mb-4"
              />
              <h3 className="text-lg font-bold text-gray-900 mb-2">
                {selectedPhoto.contentText || "Unknown Species"}
              </h3>
              <p className="text-gray-600">
                Observed on {selectedPhoto.date.toLocaleDateString()}
              </p>
            </div>
          </div>
        )}
      </div>
    </div>
  );
}

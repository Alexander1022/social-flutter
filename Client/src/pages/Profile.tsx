// ProfilePage.tsx
import { useState } from 'react';
import { Edit, Camera, Trophy, CheckCircle, Settings, Star, ChevronDown } from 'lucide-react';
import { Link } from 'react-router-dom';

export default function ProfilePage() {
  // State for visible items
  const [visiblePhotos, setVisiblePhotos] = useState(6);
  const [visibleQuests, setVisibleQuests] = useState(2);

  // Mock data
  const user = {
    firstName: 'Alex',
    lastName: 'Smith',
    email: 'alex.smith@example.com',
    avatar: '/avatar.jpg',
    photos: 24,
    totalXP: 8450,
    level: calculateLevel(8450),
    achievements: ['Novice Explorer', 'Plant Pro', 'Daily Streak']
  };

  function calculateLevel(xp: number) {
    return Math.floor(xp / 1000) + 1;
  }

  const xpForCurrentLevel = user.totalXP % 1000;
  const xpToNextLevel = 1000 - xpForCurrentLevel;

  // Extended mock data
  const userPhotos = Array(12).fill(null).map((_, i) => ({
    id: i,
    image: `/photo-${i+1}.jpg`,
    date: `2023-09-${String(i+1).padStart(2, '0')}`,
    species: ['African Elephant', 'Baobab Tree', 'Fly Agaric'][i % 3]
  }));

  const completedQuests = [
    { 
      title: 'Daily Quest', 
      completedDate: '2023-09-15',
      speciesFound: ['African Elephant', 'Baobab Tree'],
      rewardEarned: 500
    },
    { 
      title: 'Biodiversity Explorer', 
      completedDate: '2023-09-10',
      speciesFound: ['Lion', 'Giraffe', 'Acacia Tree'],
      rewardEarned: 1500
    },
    { 
      title: 'Mushroom Master', 
      completedDate: '2023-09-05',
      speciesFound: ['Fly Agaric', 'Chanterelle'],
      rewardEarned: 1000
    },
    { 
      title: 'Bird Watcher', 
      completedDate: '2023-08-28',
      speciesFound: ['Eagle', 'Flamingo'],
      rewardEarned: 800
    }
  ];

  return (
    <div className="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
      <div className="max-w-6xl mx-auto">
        {/* Profile Header */}
        <div className="bg-white rounded-xl shadow-sm p-6 mb-6 lg:mb-8">
          <div className="flex flex-col md:flex-row items-start md:items-center gap-6">
            <div className="relative group">
              <div className="relative">
                <img 
                  src={user.avatar} 
                  alt="Profile" 
                  className="w-24 h-24 rounded-full object-cover border-4 border-emerald-100"
                />
                <div className="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-emerald-600 text-white px-3 py-1 rounded-full text-sm flex items-center gap-1">
                  <Star className="w-4 h-4 fill-current" />
                  <span>{user.level}</span>
                </div>
              </div>
              <button className="absolute top-0 right-0 bg-white p-1.5 rounded-full shadow-sm border border-gray-200 hover:bg-emerald-50 transition-colors">
                <Edit className="w-5 h-5 text-gray-600" />
              </button>
            </div>
            
            <div className="flex-1">
              <h1 className="text-2xl sm:text-3xl font-bold text-gray-900 mb-1">
                {user.firstName} {user.lastName}
              </h1>
              <p className="text-gray-600 mb-3">{user.email}</p>
              
              <div className="space-y-2">
                <div className="flex items-center gap-4 text-sm sm:text-base">
                  <div className="flex items-center gap-2 text-emerald-600">
                    <Camera className="w-5 h-5" />
                    <span>{user.photos} Observations</span>
                  </div>
                  <div className="flex items-center gap-2 text-purple-600">
                    <Trophy className="w-5 h-5" />
                    <span>{user.totalXP} XP</span>
                  </div>
                </div>
                
                {/* Level Progress */}
                <div className="pt-2 max-w-md">
                  <div className="flex justify-between text-sm text-gray-600 mb-1">
                    <span>Lv. {user.level}</span>
                    <span>Lv. {user.level + 1}</span>
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
            
            <Link 
              to="/settings" 
              className="flex items-center gap-2 text-gray-600 hover:text-emerald-600 transition-colors"
            >
              <Settings className="w-5 h-5" />
              <span className="hidden sm:inline">Edit Profile</span>
            </Link>
          </div>
        </div>

        {/* Main Content */}
        <div className="grid lg:grid-cols-2 gap-6 lg:gap-8">
          {/* Photos Section */}
          <div className="bg-white rounded-xl shadow-sm p-6">
            <h2 className="text-xl font-semibold mb-4 flex items-center gap-2">
              <Camera className="w-6 h-6 text-emerald-600" />
              Recent Observations
            </h2>
            
            <div className="grid grid-cols-2 sm:grid-cols-3 gap-3">
              {userPhotos.slice(0, visiblePhotos).map((photo) => (
                <div key={photo.id} className="relative group aspect-square">
                  <img
                    src={photo.image}
                    alt={photo.species}
                    className="w-full h-full object-cover rounded-lg transition-transform group-hover:scale-105"
                  />
                  <div className="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent rounded-lg p-2 flex items-end opacity-0 group-hover:opacity-100 transition-opacity">
                    <div className="text-white">
                      <p className="text-sm font-medium">{photo.species}</p>
                      <p className="text-xs">{photo.date}</p>
                    </div>
                  </div>
                </div>
              ))}
            </div>

            {visiblePhotos < userPhotos.length && (
              <div className="mt-4 flex justify-center">
                <button
                  onClick={() => setVisiblePhotos(prev => prev + 6)}
                  className="flex items-center gap-2 text-emerald-600 hover:text-emerald-700 transition-colors font-medium"
                >
                  <ChevronDown className="w-5 h-5" />
                  View More Observations
                </button>
              </div>
            )}
          </div>

          {/* Completed Quests Section */}
          <div className="bg-white rounded-xl shadow-sm p-6">
            <h2 className="text-xl font-semibold mb-4 flex items-center gap-2">
              <Trophy className="w-6 h-6 text-purple-600" />
              Completed Quests
            </h2>
            
            <div className="space-y-4">
              {completedQuests.slice(0, visibleQuests).map((quest, index) => (
                <div key={index} className="bg-emerald-50 rounded-lg p-4 border border-emerald-100">
                  <div className="flex justify-between items-start mb-2">
                    <div className="flex items-center gap-2">
                      <CheckCircle className="w-5 h-5 text-emerald-600" />
                      <h3 className="font-medium text-gray-900">{quest.title}</h3>
                    </div>
                    <span className="text-sm text-emerald-700">
                      {quest.completedDate}
                    </span>
                  </div>
                  
                  <div className="ml-7">
                    <div className="mb-2">
                      <p className="text-sm font-medium text-gray-600">Species Discovered:</p>
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
                  onClick={() => setVisibleQuests(prev => prev + 2)}
                  className="flex items-center gap-2 text-purple-600 hover:text-purple-700 transition-colors font-medium"
                >
                  <ChevronDown className="w-5 h-5" />
                  View More Quests
                </button>
              </div>
            )}
          </div>
        </div>
      </div>
    </div>
  );
}
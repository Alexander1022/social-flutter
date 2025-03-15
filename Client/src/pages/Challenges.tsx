import { Sword, Shield, Trophy, Clock, Zap } from "lucide-react";

export default function Challenges() {
  // Mock challenges data
  const challenges = [
    {
      title: "Daily Quest",
      description: "Identify 5 plant species",
      progress: 3,
      total: 5,
      reward: 500,
      icon: <Zap className="w-8 h-8 text-yellow-500" />,
    },
    {
      title: "Weekly Challenge",
      description: "Upload 20 species observations",
      progress: 12,
      total: 20,
      reward: 2500,
      icon: <Trophy className="w-8 h-8 text-purple-500" />,
    },
    {
      title: "Expert Mission",
      description: "Discover 3 rare mushrooms",
      progress: 1,
      total: 3,
      reward: 1500,
      icon: <Shield className="w-8 h-8 text-blue-500" />,
    },
  ];

  return (
    <div className="min-h-screen bg-gradient-to-b from-gray-50 to-white p-8">
      <div className="max-w-6xl mx-auto">
        <h1 className="text-3xl font-bold text-gray-900 mb-8 flex items-center gap-3">
          <Sword className="w-8 h-8 text-orange-500" />
          Species Challenges
        </h1>

        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          {challenges.map((challenge, index) => (
            <div
              key={index}
              className="bg-white rounded-xl p-6 border border-gray-200 hover:border-emerald-400 transition-all group relative overflow-hidden shadow-sm hover:shadow-md"
            >
              <div className="absolute inset-0 bg-gradient-to-br from-emerald-100/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity" />
              
              <div className="flex items-start gap-4 mb-4">
                <div className="p-3 bg-gray-100 rounded-lg">
                  {challenge.icon}
                </div>
                <div className="flex-1">
                  <h3 className="text-xl font-semibold text-gray-900">
                    {challenge.title}
                  </h3>
                  <p className="text-gray-600">{challenge.description}</p>
                </div>
              </div>

              <div className="space-y-4">
                <div className="bg-gray-200 rounded-full h-2">
                  <div
                    className="bg-emerald-500 h-2 rounded-full transition-all duration-500"
                    style={{
                      width: `${(challenge.progress / challenge.total) * 100}%`,
                    }}
                  />
                </div>

                <div className="flex justify-between items-center text-sm">
                  <span className="text-emerald-600">
                    {challenge.progress}/{challenge.total}
                  </span>
                </div>

                <div className="flex justify-between items-center pt-4 border-t border-gray-200">
                  <span className="text-gray-900 font-medium">
                    Reward: {challenge.reward} XP
                  </span>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}
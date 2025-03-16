import axios from "axios";
import { Sword, Shield, Trophy, Clock, Zap } from "lucide-react";
import { useEffect, useState } from "react";

export default function Challenges() {
  const [challenges, setChallenges] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    const fetchData = async () => {
      setLoading(true);
      setError(null);
      
      try {
        const response = await axios.get(
          `${import.meta.env.VITE_SERVER_ENDPOINT}/api/achievements`,
          {
            headers: {
              "ngrok-skip-browser-warning": "please-ngrok-we-love-you",
              Authorization: `Bearer ${localStorage.getItem("authToken")}`,
            },
          }
        );

        const responseData = response.data;
        console.log(responseData.data);
        
        if (!responseData.data || !Array.isArray(responseData.data)) {
          throw new Error("Invalid response format: Expected data array");
        }

        const formattedData = responseData.data.map((ch: any) => {
          console.log('ch', ch);
          return {
            title: ch.name,
            description: ch.description,
            total: ch.points_to_complete,
            reward: ch.reward_xp,
            icon: <Zap className="w-8 h-8 text-yellow-500" />,
          };
        });

        console.log(formattedData);

        setChallenges(formattedData);
        setError(null);
      } catch (err) {
        if (axios.isAxiosError(err)) {
          const message = err.response?.data?.message || err.message;
          setError(`${message}`);
        } else {
          setError(err instanceof Error ? err.message : "Unknown error");
        }
      } finally {
        setLoading(false);
      }
    };

    fetchData();
  }, []);

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

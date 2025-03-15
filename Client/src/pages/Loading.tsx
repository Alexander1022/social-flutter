
export default function LoadingScreen() {
  return (
    <div className="fixed inset-0 z-50 flex items-center justify-center bg-white bg-opacity-50 backdrop-blur-sm">
      <div className="text-center">
        <div className="relative inline-block">
          <div className="w-12 h-12 rounded-full absolute border-4 border-emerald-200"></div>
          
          <div className="w-12 h-12 rounded-full animate-spin 
            border-4 border-dashed border-emerald-500 border-t-transparent">
          </div>
        </div>

        <p className="mt-3 text-gray-600 font-medium animate-pulse">
          Butter is flying...
        </p>
      </div>
    </div>
  );
};
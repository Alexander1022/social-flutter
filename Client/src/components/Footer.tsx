import { ArrowLeft, Plus, Camera, Image } from "lucide-react";
import { useEffect, useState } from 'react';
import Navbar from "./Navbar";

export default function Footer() {
  const [showMenu, setShowMenu] = useState(false);
  const [isScrolled, setIsScrolled] = useState(false);

  const handlePlusClick = () => {
    setShowMenu(!showMenu);
  };

  const handleAction = (actionType) => {
    setShowMenu(false);
    console.log(`Selected action: ${actionType}`);
  };

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 10);
    };

    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <div className="flex flex-col h-screen justify-between">
        <footer className={`fixed bottom-0 left-0 right-0 h-20 z-50 border-t border-white/20 ${
            isScrolled ? "bg-white/80 backdrop-blur-md" : "bg-white/30 backdrop-blur-sm"
        }`}>
            <div className="relative h-full max-w-6xl mx-auto">
            {/* Back Button */}
            <button className="absolute left-4 top-1/2 -translate-y-1/2 flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-purple-50 transition-colors">
                <ArrowLeft className="w-5 h-5 text-purple-600" />
                <span className="text-purple-600 font-medium hidden md:inline">Back</span>
            </button>

            {/* Centered Plus Button with Menu */}
            <div className="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
                <div className="relative">
                <button
                    onClick={handlePlusClick}
                    className="w-14 h-14 flex items-center justify-center rounded-full bg-purple-600 hover:bg-purple-700 transition-all text-white shadow-lg"
                >
                    <Plus className="w-8 h-8" />
                </button>

                {showMenu && (
                    <div className="absolute bottom-full left-1/2 -translate-x-1/2 mb-4 flex gap-4 bg-white/90 backdrop-blur-sm rounded-xl p-2 shadow-lg border border-white/20">
                    <button
                        onClick={() => handleAction('camera')}
                        className="flex flex-col items-center gap-2 p-3 hover:bg-purple-50 rounded-lg transition-colors"
                    >
                        <Camera className="w-6 h-6 text-purple-600" />
                        <span className="text-xs text-gray-600">Camera</span>
                    </button>
                    
                    <button
                        onClick={() => handleAction('gallery')}
                        className="flex flex-col items-center gap-2 p-3 hover:bg-purple-50 rounded-lg transition-colors"
                    >
                        <Image className="w-6 h-6 text-purple-600" />
                        <span className="text-xs text-gray-600">Gallery</span>
                    </button>
                    </div>
                )}
                </div>
            </div>

            {/* Navigation */}
            <div className="absolute right-4 top-1/2 -translate-y-1/2">
                <Navbar />
            </div>
            </div>
        </footer>
    </div>
  );
}
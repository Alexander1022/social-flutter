import { ArrowLeft, Plus } from "lucide-react";
import { useEffect, useState, useRef } from "react";
import { useNavigate } from "react-router";
import Navbar from "./Navbar";
import { LatLngTuple } from "leaflet";

interface FooterProps {
  userPosition: LatLngTuple | null;
}

export default function Footer({ userPosition }: FooterProps) {
  const [isScrolled, setIsScrolled] = useState(false);
  const galleryInputRef = useRef<HTMLInputElement>(null);
  const navigate = useNavigate();

  const handlePlusClick = () => {
    if (galleryInputRef.current) {
      galleryInputRef.current.click();
    }
  };

  const handleFileSelect = (e: React.ChangeEvent<HTMLInputElement>) => {
    const file = e.target.files?.[0];
    if (file) {
      const reader = new FileReader();
      reader.onloadend = () => {
        navigate('/upload', { 
          state: { 
            imageData: reader.result,
            coordinates: userPosition 
          } 
        });
      };
      reader.readAsDataURL(file);
    }
  };

  useEffect(() => {
    const handleScroll = () => {
      setIsScrolled(window.scrollY > 10);
    };

    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <footer
      className={`fixed bottom-0 left-0 right-0 h-20 z-50 border-t border-white/20 ${
        isScrolled
          ? "bg-white/80 backdrop-blur-md"
          : "bg-white/30 backdrop-blur-sm"
      }`}
    >
      <div className="relative h-full max-w-6xl mx-auto">
        <button 
          className="absolute left-4 top-1/2 -translate-y-1/2 flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-emerald-50 transition-colors"
          onClick={() => navigate(-1)}
        >
          <ArrowLeft className="w-5 h-5 text-emerald-600" />
          <span className="text-emerald-600 font-medium hidden md:inline">
            Back
          </span>
        </button>

        <div className="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2">
          <button
            onClick={handlePlusClick}
            className="w-14 h-14 flex items-center justify-center rounded-full bg-emerald-600 hover:bg-emerald-700 transition-all text-white shadow-lg"
          >
            <Plus className="w-8 h-8" />
          </button>
        </div>

        <div className="absolute right-4 top-1/2 -translate-y-1/2">
          <Navbar />
        </div>
      </div>

      <input
        type="file"
        accept="image/*"
        style={{ display: "none" }}
        ref={galleryInputRef}
        onChange={handleFileSelect}
      />
    </footer>
  );
}
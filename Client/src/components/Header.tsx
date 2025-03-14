import { useState, useEffect } from "react";
import { Menu, Sprout, X } from "lucide-react";
import Button from "./Button";

export default function Navbar() {
  const [isScrolled, setIsScrolled] = useState(false);

  useEffect(() => {
    const handleScroll = () => {
      if (window.scrollY > 10) {
        setIsScrolled(true);
      } else {
        setIsScrolled(false);
      }
    };

    window.addEventListener("scroll", handleScroll);
    return () => window.removeEventListener("scroll", handleScroll);
  }, []);

  return (
    <header
      className={`sticky top-0 left-0 right-0 z-50 transition-all duration-300 ${
        isScrolled ? "bg-white/80 backdrop-blur-md shadow-sm" : "bg-transparent"
      }`}
    >
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex items-center justify-between h-16 md:h-20">
          <div className="flex items-center">
            <Button className="flex items-center space-x-2">
              <Sprout className="h-8 w-8 text-purple-600" />
              <span className="text-xl font-bold text-gray-900">
                Fly Away
              </span>
            </Button>
          </div>

          <div className="md:flex items-center space-x-4">
              <button className="border-purple-200 text-purple-700">
                Sign In
              </button>
              <Button className="border border-purple-600 font-medium py-2 px-4 rounded bg-purple-600 text-white">
                Register
              </Button>
          </div>

        </div>
      </div>
    </header>
  );
}

import { useState, useEffect } from "react";
import { Sprout } from "lucide-react";
import Button from "./Button";
import { Link, useNavigate } from "react-router";

export default function Navbar() {
  const [isScrolled, setIsScrolled] = useState(false);
  const navigate = useNavigate();

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
              <Sprout className="h-8 w-8 text-emerald-600" />
              <span className="text-xl font-bold text-gray-900">Fly Away</span>
            </Button>
          </div>

          <div className="md:flex items-center space-x-4">
            <Link to="/login"
              className="border-emerald-200 text-emerald-700"
            >
              Sign In
            </Link>
            <Link to="/register"
              className="border border-emerald-600 font-medium py-2 px-4 rounded bg-emerald-600 text-white"
            >
              Register
            </Link>
          </div>
        </div>
      </div>
    </header>
  );
}

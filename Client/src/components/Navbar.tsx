import { useState } from "react";
import { Link } from "react-router-dom";
import { Menu, X, LayoutDashboard, Compass } from "lucide-react";
import Button from "./Button";

export default function Navbar() {
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

  return (
    <nav className="flex items-center gap-4 md:gap-6">
      {/* Desktop Navigation */}
      <div className="hidden md:flex items-center space-x-4">
        <Link to="/challenges">
          <Button className="text-gray-700 hover:text-emerald-600 font-medium inline-flex items-center gap-2">
            <LayoutDashboard className="h-5 w-5" />
            Challenges
          </Button>
        </Link>
        <Link to="/explore">
          <Button className="text-gray-700 hover:text-emerald-600 font-medium inline-flex items-center gap-2">
            <Compass className="h-5 w-5" />
            Explore
          </Button>
        </Link>
      </div>

      {/* Mobile Menu Toggle */}
      <div className="md:hidden">
        <button
          onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
          className="text-gray-700 hover:text-emerald-600"
          aria-label="Toggle navigation menu"
        >
          {isMobileMenuOpen ? <X className="h-6 w-6" /> : <Menu className="h-6 w-6" />}
        </button>
      </div>

      {/* Mobile Navigation Menu */}
      {isMobileMenuOpen && (
        <div className="md:hidden absolute bottom-16 right-4 bg-white/95 backdrop-blur-sm rounded-lg shadow-lg p-4">
          <div className="flex flex-col gap-3">
            <Link 
              to="/challenges" 
              onClick={() => setIsMobileMenuOpen(false)}
              className="inline-flex items-center gap-2"
            >
              <Button className="text-gray-700 hover:text-emerald-600">
                <LayoutDashboard className="h-5 w-5 mr-2" />
                Challenges
              </Button>
            </Link>
            <Link 
              to="/explore" 
              onClick={() => setIsMobileMenuOpen(false)}
              className="inline-flex items-center gap-2"
            >
              <Button className="text-gray-700 hover:text-emerald-600">
                <Compass className="h-5 w-5 mr-2" />
                Explore
              </Button>
            </Link>
          </div>
        </div>
      )}
    </nav>
  );
}
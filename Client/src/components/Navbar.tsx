import { useState, useEffect } from "react";
import { Brain, Menu, X } from "lucide-react";
import Button from "./Button";

export default function Navbar() {
  const [isScrolled, setIsScrolled] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

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
      className={`fixed top-0 left-0 right-0 z-50 transition-all duration-300 ${
        isScrolled ? "bg-white/80 backdrop-blur-md shadow-sm" : "bg-transparent"
      }`}
    >
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex items-center justify-between h-16 md:h-20">
          <div className="flex items-center">
            <Button className="flex items-center space-x-2">
              <Brain className="h-8 w-8 text-purple-600" />
              <span className="text-xl font-bold text-gray-900">
                Social Butterfly
              </span>
            </Button>
          </div>

          <nav className="hidden md:flex items-center space-x-8">
            <Button
              className="text-gray-700 hover:text-purple-600 font-medium"
            >
              Home
            </Button>
            <Button
              className="text-gray-700 hover:text-purple-600 font-medium"
            >
              Features
            </Button>
            <Button
              className="text-gray-700 hover:text-purple-600 font-medium"
            >
              About
            </Button>
            <Button
              className="text-gray-700 hover:text-purple-600 font-medium"
            >
              Contact
            </Button>
          </nav>

          <div className="hidden md:flex items-center space-x-4">
              <button className="border-purple-200 text-purple-700">
                Sign In
              </button>
              <Button className="border border-purple-600 font-medium py-2 px-4 rounded bg-purple-600 text-white">
                Register
              </Button>
          </div>

          <div className="md:hidden">
            <button
              onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
              className="text-gray-700 hover:text-purple-600 focus:outline-none"
            >
              {isMobileMenuOpen ? (
                <X className="h-6 w-6" />
              ) : (
                <Menu className="h-6 w-6" />
              )}
            </button>
          </div>
        </div>
      </div>

      {isMobileMenuOpen && (
        <div className="md:hidden bg-white/95 backdrop-blur-sm shadow-lg">
          <div className="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <Button
              className="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50"
              onClick={() => setIsMobileMenuOpen(false)}
            >
              Home
            </Button>
            <Button
              className="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50"
              onClick={() => setIsMobileMenuOpen(false)}
            >
              Features
            </Button>
            <Button
              className="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50"
              onClick={() => setIsMobileMenuOpen(false)}
            >
              About
            </Button>
            <Button
              className="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50"
              onClick={() => setIsMobileMenuOpen(false)}
            >
              Contact
            </Button>
          </div>
          <div className="pt-4 pb-3 border-t border-gray-200">
            <div className="flex items-center px-5">
              <Button
                className="block w-full px-3 py-2 rounded-md text-center text-base font-medium text-gray-700 hover:text-purple-600 hover:bg-purple-50"
                onClick={() => setIsMobileMenuOpen(false)}
              >
                Sign In
              </Button>
            </div>
            <div className="mt-3 px-5 pb-2">
              <Button
                className="block w-full px-3 py-2 rounded-md text-center text-base font-medium bg-purple-600 text-white hover:bg-purple-700"
                onClick={() => setIsMobileMenuOpen(false)}
              >
                Register
              </Button>
            </div>
          </div>
        </div>
      )}
    </header>
  );
}

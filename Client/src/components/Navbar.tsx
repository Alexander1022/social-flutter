import { useState } from "react";
import { Menu, X } from "lucide-react";
import Button from "./Button";

export default function Navbar() {
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

  return (
    <nav className="flex items-center gap-4 md:gap-6">
      {/* Desktop Menu */}
      <div className="hidden md:flex items-center space-x-4">
        <Button className="text-gray-700 hover:text-purple-600 font-medium">
          Home
        </Button>
        <Button className="text-gray-700 hover:text-purple-600 font-medium">
          Features
        </Button>
        <Button className="text-gray-700 hover:text-purple-600 font-medium">
          About
        </Button>
        <Button className="text-gray-700 hover:text-purple-600 font-medium">
          Contact
        </Button>
      </div>

      {/* Mobile Menu Toggle */}
      <div className="md:hidden">
        <button
          onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
          className="text-gray-700 hover:text-purple-600"
        >
          {isMobileMenuOpen ? <X className="h-6 w-6" /> : <Menu className="h-6 w-6" />}
        </button>
      </div>

      {/* Mobile Menu */}
      {isMobileMenuOpen && (
        <div className="absolute bottom-16 right-4 bg-white/95 backdrop-blur-sm rounded-lg shadow-lg p-4">
          <div className="flex flex-col gap-3">
            <Button className="text-gray-700 hover:text-purple-600">
              Home
            </Button>
            <Button className="text-gray-700 hover:text-purple-600">
              Features
            </Button>
            <Button className="text-gray-700 hover:text-purple-600">
              About
            </Button>
            <Button className="text-gray-700 hover:text-purple-600">
              Contact
            </Button>
          </div>
        </div>
      )}
    </nav>
  );
}
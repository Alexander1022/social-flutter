import {
  FlaskRoundIcon as Flask,
  Search,
  Atom,
  PawPrint,
  Leaf,
  Trees,
  BookOpenCheck,
  BrainCircuit,
} from "lucide-react";
import Button from "../components/Button";
import { Link } from "react-router";

export default function Home() {
  return (
    <div className="min-h-screen bg-gradient-to-b from-emerald-50 to-blue-50">
      <section className="pt-32 pb-20 px-4 md:px-8">
        <div className="max-w-6xl mx-auto">
          <div className="flex flex-col md:flex-row items-center gap-12">
            <div className="flex-1 space-y-6">
              <div className="inline-block px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 font-medium text-sm">
                Discover Species
              </div>
              <h1 className="text-4xl md:text-6xl font-bold text-gray-900 leading-tight">
                Explore the world of{" "}
                <span className="text-emerald-600">nature and species</span>
              </h1>
              <p className="text-lg text-gray-600 max-w-xl">
                Join our platform to collaborate with researchers and explore
                the world of plants, animals, and more.
              </p>
              <div className="flex flex-col sm:flex-row gap-4 pt-4">
                <Link
                  to="/register"
                  className="border border-emerald-600 font-medium py-2 px-4 rounded bg-emerald-600 text-white"
                >
                  Get Started
                </Link>

                <Button className="border-emerald-200 text-emerald-700">
                  <Link to="/app">Try Demo</Link>
                </Button>
              </div>
            </div>
            <div className="flex-1 relative">
              <div className="absolute -top-10 -left-10 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
              <div className="absolute -bottom-10 -right-10 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
              <div className="absolute inset-0 w-64 h-64 mx-auto my-auto bg-pink-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000"></div>
              <div className="relative backdrop-blur-sm bg-white/30 border border-white/20 rounded-2xl p-8 shadow-xl">
                <div className="grid grid-cols-2 gap-8">
                  <div className="flex flex-col items-center p-4 bg-white/60 rounded-xl shadow-sm">
                    <Leaf className="w-12 h-12 text-green-600 mb-3" />
                    <h3 className="font-medium text-gray-900">
                      Plants Classifications
                    </h3>
                  </div>
                  <div className="flex flex-col items-center p-4 bg-white/60 rounded-xl shadow-sm">
                    <Search className="w-12 h-12 text-blue-600 mb-3" />
                    <h3 className="font-medium text-gray-900">Data Analysis</h3>
                  </div>
                  <div className="flex flex-col items-center p-4 bg-white/60 rounded-xl shadow-sm">
                    <PawPrint className="w-12 h-12 text-pink-600 mb-3" />
                    <h3 className="font-medium text-gray-900">
                      Animal Classifications
                    </h3>
                  </div>
                  <div className="flex flex-col items-center p-4 bg-white/60 rounded-xl shadow-sm">
                    <Trees className="w-12 h-12 text-teal-600 mb-3" />
                    <h3 className="font-medium text-gray-900">
                      Location-based
                    </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="py-20 px-4 md:px-8 bg-white/50">
        <div className="max-w-6xl mx-auto">
          <div className="text-center mb-16">
            <h2 className="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
              Powerful Scientific Tools
            </h2>
            <p className="text-lg text-gray-600 max-w-2xl mx-auto">
              Our platform provides everything you need to accelerate your
              research and collaborate effectively with others.
            </p>
          </div>

          <div className="grid md:grid-cols-3 gap-8">
            <div className="backdrop-blur-sm bg-white/40 border border-white/20 rounded-xl p-6 shadow-lg transition-transform hover:scale-105">
              <div className="w-14 h-14 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                <BookOpenCheck className="w-8 h-8 text-purple-600" />
              </div>
              <h3 className="text-xl font-semibold text-gray-900 mb-3">
                Share with others
              </h3>
              <p className="text-gray-600">
                Share a photo of a plant or animal in your region and get
                instant identification.
              </p>
            </div>

            <div className="backdrop-blur-sm bg-white/40 border border-white/20 rounded-xl p-6 shadow-lg transition-transform hover:scale-105">
              <div className="w-14 h-14 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                <Search className="w-8 h-8 text-blue-600" />
              </div>
              <h3 className="text-xl font-semibold text-gray-900 mb-3">
                Advanced Search
              </h3>
              <p className="text-gray-600">
                Find relevant information and photos with our powerful search
                tools.
              </p>
            </div>

            <div className="backdrop-blur-sm bg-white/40 border border-white/20 rounded-xl p-6 shadow-lg transition-transform hover:scale-105">
              <div className="w-14 h-14 bg-pink-100 rounded-lg flex items-center justify-center mb-6">
                <BrainCircuit className="w-8 h-8 text-pink-600" />
              </div>
              <h3 className="text-xl font-semibold text-gray-900 mb-3">
                Identification
              </h3>
              <p className="text-gray-600">
                User our AI-powered identification tool to classify plants and
                animals you find.
              </p>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
}

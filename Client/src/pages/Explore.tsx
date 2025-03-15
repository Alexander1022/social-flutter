// ExplorePage.tsx
import { useState } from 'react';
import { Search, Sliders, XCircle } from 'lucide-react';

export default function Explore() {
  const [searchQuery, setSearchQuery] = useState('');
  const [filters, setFilters] = useState({
    category: '',
    difficulty: '',
    location: ''
  });

  // Mock data
  const speciesData = [
    {
      id: 1,
      name: 'African Elephant',
      category: 'animal',
      location: 'Savannah',
      image: '/elephant.jpg',
      observations: 245
    },
    {
      id: 2,
      name: 'Baobab Tree',
      category: 'plant',
      location: 'Madagascar',
      image: '/baobab.jpg',
      observations: 178
    },
    // Add more mock data...
  ];

  const filteredSpecies = speciesData.filter(item => {
    const matchesSearch = item.name.toLowerCase().includes(searchQuery.toLowerCase());
    const matchesCategory = filters.category ? item.category === filters.category : true;
    return matchesSearch && matchesCategory;
  });

  return (
    <div className="min-h-screen bg-gray-50 p-4 sm:p-6 lg:p-8">
      <div className="max-w-6xl mx-auto">
        {/* Search Section */}
        <div className="mb-8 space-y-4">
          <h1 className="text-2xl sm:text-3xl font-bold text-gray-900">
            Explore Species
          </h1>
          
          <div className="relative">
            <div className="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <Search className="h-5 w-5 text-gray-400" />
            </div>
            <input
              type="text"
              placeholder="Search species, locations, or categories..."
              className="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"
              value={searchQuery}
              onChange={(e) => setSearchQuery(e.target.value)}
            />
            {searchQuery && (
              <button
                onClick={() => setSearchQuery('')}
                className="absolute inset-y-0 right-0 pr-3 flex items-center"
              >
                <XCircle className="h-5 w-5 text-gray-400 hover:text-gray-500" />
              </button>
            )}
          </div>

          {/* Filters */}
          <div className="flex flex-wrap gap-3">
            <button
              onClick={() => setFilters({ ...filters, category: 'animal' })}
              className={`px-4 py-2 rounded-full text-sm font-medium ${
                filters.category === 'animal' 
                  ? 'bg-emerald-600 text-white'
                  : 'bg-white text-gray-700 border border-gray-300 hover:border-emerald-400'
              }`}
            >
              🐾 Animals
            </button>
            <button
              onClick={() => setFilters({ ...filters, category: 'plant' })}
              className={`px-4 py-2 rounded-full text-sm font-medium ${
                filters.category === 'plant' 
                  ? 'bg-emerald-600 text-white'
                  : 'bg-white text-gray-700 border border-gray-300 hover:border-emerald-400'
              }`}
            >
              🌿 Plants
            </button>
            <button
              onClick={() => setFilters({ ...filters, category: '' })}
              className="px-4 py-2 rounded-full text-sm font-medium bg-white text-gray-700 border border-gray-300 hover:border-emerald-400"
            >
              <XCircle className="h-4 w-4 inline-block mr-1" />
              Clear Filters
            </button>
          </div>
        </div>

        {/* Results Grid */}
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
          {filteredSpecies.map((species) => (
            <div
              key={species.id}
              className="bg-white rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200"
            >
              <div className="relative aspect-video overflow-hidden rounded-t-xl">
                <img
                  src={species.image}
                  alt={species.name}
                  className="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                />
                <div className="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent p-4">
                  <h3 className="text-lg font-semibold text-white">
                    {species.name}
                  </h3>
                </div>
              </div>
              <div className="p-4">
                <div className="flex items-center justify-between text-sm text-gray-600">
                  <span className="inline-flex items-center">
                    <Sliders className="h-4 w-4 mr-1" />
                    {species.category}
                  </span>
                  <span>👤 {species.observations}</span>
                </div>
                <p className="mt-2 text-sm text-gray-500">
                  Found in {species.location}
                </p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}
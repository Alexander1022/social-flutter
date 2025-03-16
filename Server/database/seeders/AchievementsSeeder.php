<?php

namespace Database\Seeders;

use App\Models\Achievement;
use App\Models\SpecieType;
use Illuminate\Database\Seeder;

class AchievementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define achievements
        $achievements = [
            [
                'name' => 'Bird Watcher',
                'description' => 'Observe 10 different bird species',
                'points_to_complete' => 10,
                'reward_xp' => 100,
                'specie_types' => ['Bird', 'Waterfowl']
            ],
            [
                'name' => 'Marine Explorer',
                'description' => 'Discover 5 marine species',
                'points_to_complete' => 5,
                'reward_xp' => 50,
                'specie_types' => ['Fish', 'Marine Mammal']
            ],
            [
                'name' => 'Butterfly Collector',
                'description' => 'Identify 15 butterfly species',
                'points_to_complete' => 15,
                'reward_xp' => 150,
                'specie_types' => ['Insect']
            ],
            [
                'name' => 'Master Naturalist',
                'description' => 'Observe species from all categories',
                'points_to_complete' => 50,
                'reward_xp' => 500,
                'specie_types' => ['Bird', 'Waterfowl', 'Fish', 'Marine Mammal', 'Insect', 'Mammal', 'Reptile', 'Amphibian']
            ],
            // 50 Additional Achievements
            [
                'name' => 'Colorful Creature Seeker',
                'description' => 'Discover 20 colorful species',
                'points_to_complete' => 20,
                'reward_xp' => 200,
                'specie_types' => ['Colorful']
            ],
            [
                'name' => 'Endangered Guardian',
                'description' => 'Identify 10 endangered species',
                'points_to_complete' => 10,
                'reward_xp' => 150,
                'specie_types' => ['Endangered']
            ],
            [
                'name' => 'Fruit Finder',
                'description' => 'Find 15 fruit species',
                'points_to_complete' => 15,
                'reward_xp' => 100,
                'specie_types' => ['Fruit']
            ],
            [
                'name' => 'Tiny Explorer',
                'description' => 'Observe 25 small species',
                'points_to_complete' => 25,
                'reward_xp' => 200,
                'specie_types' => ['Small']
            ],
            [
                'name' => 'Gentle Giant Spotter',
                'description' => 'Document 8 large species',
                'points_to_complete' => 8,
                'reward_xp' => 120,
                'specie_types' => ['Big']
            ],
            [
                'name' => 'Slime Enthusiast',
                'description' => 'Find 5 slimy species',
                'points_to_complete' => 5,
                'reward_xp' => 75,
                'specie_types' => ['Slimy']
            ],
            [
                'name' => 'Striped Specialist',
                'description' => 'Identify 12 striped species',
                'points_to_complete' => 12,
                'reward_xp' => 120,
                'specie_types' => ['Striped']
            ],
            [
                'name' => 'Spotted Observer',
                'description' => 'Document 10 spotted species',
                'points_to_complete' => 10,
                'reward_xp' => 100,
                'specie_types' => ['Spotted']
            ],
            [
                'name' => 'Chameleon Tracker',
                'description' => 'Find 3 color-changing species',
                'points_to_complete' => 3,
                'reward_xp' => 90,
                'specie_types' => ['Color-changing', 'Colour-changing']
            ],
            [
                'name' => 'Leggy Creature Expert',
                'description' => 'Observe 15 species with prominent legs',
                'points_to_complete' => 15,
                'reward_xp' => 150,
                'specie_types' => ['Legs']
            ],
            [
                'name' => 'Fluffy Friend Finder',
                'description' => 'Document 8 fluffy animals',
                'points_to_complete' => 8,
                'reward_xp' => 80,
                'specie_types' => ['Fluffy']
            ],
            [
                'name' => 'Fur Detective',
                'description' => 'Identify 12 furry species',
                'points_to_complete' => 12,
                'reward_xp' => 120,
                'specie_types' => ['Furry']
            ],
            [
                'name' => 'Floppy Feature Fanatic',
                'description' => 'Find 5 species with floppy features',
                'points_to_complete' => 5,
                'reward_xp' => 50,
                'specie_types' => ['Floppy']
            ],
            [
                'name' => 'Sharp Spotter',
                'description' => 'Observe 10 species with pointy features',
                'points_to_complete' => 10,
                'reward_xp' => 100,
                'specie_types' => ['Pointy']
            ],
            [
                'name' => 'Walking Watcher',
                'description' => 'Document 20 species that walk',
                'points_to_complete' => 20,
                'reward_xp' => 200,
                'specie_types' => ['Walks']
            ],
            [
                'name' => 'Aquatic Admirer',
                'description' => 'Identify 15 swimming species',
                'points_to_complete' => 15,
                'reward_xp' => 150,
                'specie_types' => ['Swims']
            ],
            [
                'name' => 'Slithering Seeker',
                'description' => 'Find 8 slithering species',
                'points_to_complete' => 8,
                'reward_xp' => 80,
                'specie_types' => ['Slithers']
            ],
            [
                'name' => 'Sky Surveyor',
                'description' => 'Observe 25 flying species',
                'points_to_complete' => 25,
                'reward_xp' => 250,
                'specie_types' => ['Flies']
            ],
            [
                'name' => 'Backbone Biologist',
                'description' => 'Document 30 vertebrate species',
                'points_to_complete' => 30,
                'reward_xp' => 300,
                'specie_types' => ['Vertebrates']
            ],
            [
                'name' => 'Spineless Specialist',
                'description' => 'Identify 25 invertebrate species',
                'points_to_complete' => 25,
                'reward_xp' => 250,
                'specie_types' => ['Invertebrates']
            ],
            [
                'name' => 'Urban Wildlife Observer',
                'description' => 'Document 15 species in urban environments',
                'points_to_complete' => 15,
                'reward_xp' => 150,
                'specie_types' => ['Bird', 'Mammal', 'Insect', 'Small']
            ],
            [
                'name' => 'Forest Explorer',
                'description' => 'Identify 20 species in forest habitats',
                'points_to_complete' => 20,
                'reward_xp' => 200,
                'specie_types' => ['Bird', 'Mammal', 'Insect', 'Reptile', 'Amphibian']
            ],
            [
                'name' => 'Desert Discoverer',
                'description' => 'Find 10 species in desert environments',
                'points_to_complete' => 10,
                'reward_xp' => 150,
                'specie_types' => ['Reptile', 'Mammal', 'Small']
            ],
            [
                'name' => 'Wetland Wanderer',
                'description' => 'Observe 12 wetland species',
                'points_to_complete' => 12,
                'reward_xp' => 120,
                'specie_types' => ['Bird', 'Amphibian', 'Fish', 'Waterfowl']
            ],
            [
                'name' => 'Nighttime Naturalist',
                'description' => 'Document 8 nocturnal species',
                'points_to_complete' => 8,
                'reward_xp' => 160,
                'specie_types' => ['Mammal', 'Bird', 'Insect']
            ],
            [
                'name' => 'Alpine Adventurer',
                'description' => 'Identify 6 high-altitude species',
                'points_to_complete' => 6,
                'reward_xp' => 120,
                'specie_types' => ['Bird', 'Mammal', 'Fluffy']
            ],
            [
                'name' => 'River Researcher',
                'description' => 'Find 15 freshwater species',
                'points_to_complete' => 15,
                'reward_xp' => 150,
                'specie_types' => ['Fish', 'Amphibian', 'Waterfowl']
            ],
            [
                'name' => 'Predator Profiler',
                'description' => 'Observe 10 predatory species',
                'points_to_complete' => 10,
                'reward_xp' => 200,
                'specie_types' => ['Bird', 'Mammal', 'Fish', 'Reptile']
            ],
            [
                'name' => 'Herbivore Hunter',
                'description' => 'Document 15 herbivore species',
                'points_to_complete' => 15,
                'reward_xp' => 150,
                'specie_types' => ['Mammal', 'Bird', 'Insect']
            ],
            [
                'name' => 'Seasonal Spotter',
                'description' => 'Identify 20 species across all four seasons',
                'points_to_complete' => 20,
                'reward_xp' => 200,
                'specie_types' => ['Bird', 'Mammal', 'Insect', 'Plant']
            ],
            [
                'name' => 'Migration Tracker',
                'description' => 'Observe 10 migratory species',
                'points_to_complete' => 10,
                'reward_xp' => 150,
                'specie_types' => ['Bird', 'Waterfowl', 'Fish']
            ],
            [
                'name' => 'Tropical Treasure Hunter',
                'description' => 'Find 15 tropical species',
                'points_to_complete' => 15,
                'reward_xp' => 180,
                'specie_types' => ['Bird', 'Reptile', 'Insect', 'Colorful']
            ],
            [
                'name' => 'Coastal Cataloguer',
                'description' => 'Document 20 coastal species',
                'points_to_complete' => 20,
                'reward_xp' => 200,
                'specie_types' => ['Bird', 'Fish', 'Marine Mammal', 'Waterfowl']
            ],
            [
                'name' => 'Grassland Guide',
                'description' => 'Identify 12 grassland species',
                'points_to_complete' => 12,
                'reward_xp' => 120,
                'specie_types' => ['Mammal', 'Bird', 'Insect']
            ],
            [
                'name' => 'Tiny Pond Explorer',
                'description' => 'Observe 8 pond-dwelling species',
                'points_to_complete' => 8,
                'reward_xp' => 80,
                'specie_types' => ['Amphibian', 'Fish', 'Insect']
            ],
            [
                'name' => 'Mountain Marvel',
                'description' => 'Find 10 mountain species',
                'points_to_complete' => 10,
                'reward_xp' => 150,
                'specie_types' => ['Mammal', 'Bird', 'Reptile']
            ],
            [
                'name' => 'Reef Researcher',
                'description' => 'Document 15 coral reef species',
                'points_to_complete' => 15,
                'reward_xp' => 200,
                'specie_types' => ['Fish', 'Invertebrates', 'Colorful']
            ],
            [
                'name' => 'Dawn Discoverer',
                'description' => 'Identify 10 species at dawn',
                'points_to_complete' => 10,
                'reward_xp' => 100,
                'specie_types' => ['Bird', 'Mammal', 'Insect']
            ],
            [
                'name' => 'Island Investigator',
                'description' => 'Observe 8 island-endemic species',
                'points_to_complete' => 8,
                'reward_xp' => 160,
                'specie_types' => ['Bird', 'Reptile', 'Mammal', 'Endangered']
            ],
            [
                'name' => 'Cave Creature Seeker',
                'description' => 'Find 5 cave-dwelling species',
                'points_to_complete' => 5,
                'reward_xp' => 100,
                'specie_types' => ['Invertebrates', 'Mammal', 'Amphibian']
            ],
            [
                'name' => 'Pollinator Protector',
                'description' => 'Document 12 pollinating species',
                'points_to_complete' => 12,
                'reward_xp' => 120,
                'specie_types' => ['Insect', 'Bird']
            ],
            [
                'name' => 'Winter Watcher',
                'description' => 'Identify 8 species active in winter',
                'points_to_complete' => 8,
                'reward_xp' => 120,
                'specie_types' => ['Bird', 'Mammal', 'Fluffy']
            ],
            [
                'name' => 'Tundra Tracker',
                'description' => 'Observe 6 tundra species',
                'points_to_complete' => 6,
                'reward_xp' => 120,
                'specie_types' => ['Mammal', 'Bird', 'Furry']
            ],
            [
                'name' => 'Deep Sea Detective',
                'description' => 'Find 5 deep-sea species',
                'points_to_complete' => 5,
                'reward_xp' => 150,
                'specie_types' => ['Fish', 'Invertebrates']
            ],
            [
                'name' => 'Rainforest Ranger',
                'description' => 'Document 20 rainforest species',
                'points_to_complete' => 20,
                'reward_xp' => 200,
                'specie_types' => ['Bird', 'Mammal', 'Reptile', 'Amphibian', 'Insect', 'Colorful']
            ],
            [
                'name' => 'Metamorphosis Master',
                'description' => 'Identify 8 species that undergo metamorphosis',
                'points_to_complete' => 8,
                'reward_xp' => 160,
                'specie_types' => ['Amphibian', 'Insect']
            ],
            [
                'name' => 'Camouflage Connoisseur',
                'description' => 'Observe 10 well-camouflaged species',
                'points_to_complete' => 10,
                'reward_xp' => 150,
                'specie_types' => ['Insect', 'Reptile', 'Fish', 'Bird']
            ],
            [
                'name' => 'Unique Pattern Finder',
                'description' => 'Find 15 species with unique patterns',
                'points_to_complete' => 15,
                'reward_xp' => 150,
                'specie_types' => ['Spotted', 'Striped', 'Colorful']
            ],
            [
                'name' => 'Bioluminescent Biologist',
                'description' => 'Document 5 bioluminescent species',
                'points_to_complete' => 5,
                'reward_xp' => 200,
                'specie_types' => ['Fish', 'Invertebrates', 'Insect']
            ],
            [
                'name' => 'Conservation Champion',
                'description' => 'Identify 15 conservationally significant species',
                'points_to_complete' => 15,
                'reward_xp' => 300,
                'specie_types' => ['Endangered', 'Vertebrates', 'Invertebrates']
            ]
        ];

        foreach ($achievements as $achievementData) {
            $specieTypeNames = $achievementData['specie_types'];
            unset($achievementData['specie_types']);

            $achievement = Achievement::firstOrCreate(['name' => $achievementData['name']], $achievementData);

            $specieTypeIds = SpecieType::whereIn('name', $specieTypeNames)
                ->pluck('id')
                ->toArray();

            if (!empty($specieTypeIds)) {
                $achievement->specieTypes()->attach($specieTypeIds);
                $this->command->info("Achievement '{$achievement->name}' associated with " . count($specieTypeIds) . " specie types");
            }
        }
    }
}


<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AchievementsSeeder extends Seeder
{
    public function run()
    {

        if (DB::table('achievements')->where('name', 'Purple Hunter')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Purple Hunter',
                    'description' => 'Find and photograph 5 different purple-colored plant species.',
                    'points_to_complete' => 5,
                    'reward_xp' => 25,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Purple')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Purple Passion')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Purple Passion',
                    'description' => 'Document 8 different purple plants in their natural habitats.',
                    'points_to_complete' => 8,
                    'reward_xp' => 40,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Purple')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Scarlet Seeker')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Scarlet Seeker',
                    'description' => 'Locate and photograph 6 vibrant red plant species.',
                    'points_to_complete' => 6,
                    'reward_xp' => 30,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Red')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Red Alert')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Red Alert',
                    'description' => 'Find 4 red plants that use their color as a warning or to attract pollinators.',
                    'points_to_complete' => 4,
                    'reward_xp' => 25,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Red')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Rainbow Collection')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Rainbow Collection',
                    'description' => 'Photograph 7 plants with multiple vibrant colors on their flowers or leaves.',
                    'points_to_complete' => 7,
                    'reward_xp' => 35,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Colourful')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Color Spectrum')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Color Spectrum',
                    'description' => 'Document 5 colorful plants that change hues during their lifecycle.',
                    'points_to_complete' => 5,
                    'reward_xp' => 30,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Colourful')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'White Wonders')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'White Wonders',
                    'description' => 'Find and photograph 6 plants with pristine white flowers or foliage.',
                    'points_to_complete' => 6,
                    'reward_xp' => 30,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'White')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Moonlight Blooms')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Moonlight Blooms',
                    'description' => 'Capture 4 white-flowered plants that bloom at night or in low light.',
                    'points_to_complete' => 4,
                    'reward_xp' => 40,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'White')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Spine Collector')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Spine Collector',
                    'description' => 'Document 8 different spiky plants and their defensive adaptations.',
                    'points_to_complete' => 8,
                    'reward_xp' => 35,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Spiky')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Pointed Protection')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Pointed Protection',
                    'description' => 'Find 5 spiky plants that use their spines for purposes other than defense.',
                    'points_to_complete' => 5,
                    'reward_xp' => 30,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Spiky')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Long Type Achievements
        if (DB::table('achievements')->where('name', 'Reaching for the Sky')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Reaching for the Sky',
                    'description' => 'Photograph 4 plants with exceptionally long stems, stalks, or growth habits.',
                    'points_to_complete' => 4,
                    'reward_xp' => 25,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Long')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Lengthy Specimens')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Lengthy Specimens',
                    'description' => 'Document 6 plants with notably long leaves, flowers, or seed pods.',
                    'points_to_complete' => 6,
                    'reward_xp' => 30,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Long')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Thin Type Achievements
        if (DB::table('achievements')->where('name', 'Slender Beauty')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Slender Beauty',
                    'description' => 'Find and photograph 7 plants with remarkably thin stems or leaves.',
                    'points_to_complete' => 7,
                    'reward_xp' => 30,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Thin')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Wispy Wonders')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Wispy Wonders',
                    'description' => 'Capture 5 thin, delicate plants that seem to dance in the slightest breeze.',
                    'points_to_complete' => 5,
                    'reward_xp' => 25,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Thin')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Smelly Type Achievements
        if (DB::table('achievements')->where('name', 'Scent Seeker')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Scent Seeker',
                    'description' => 'Document 6 plants with distinctive aromas, pleasant or unpleasant.',
                    'points_to_complete' => 6,
                    'reward_xp' => 35,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Smelly')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Aromatic Collection')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Aromatic Collection',
                    'description' => 'Find 4 plants that release their scent at specific times of day or in certain conditions.',
                    'points_to_complete' => 4,
                    'reward_xp' => 30,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Smelly')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Green Type Achievements
        if (DB::table('achievements')->where('name', 'Verdant Variety')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Verdant Variety',
                    'description' => 'Photograph 8 plants displaying different shades and hues of green.',
                    'points_to_complete' => 8,
                    'reward_xp' => 35,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Green')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Green Giants')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Green Giants',
                    'description' => 'Document 5 plants with extraordinarily green adaptations for maximum photosynthesis.',
                    'points_to_complete' => 5,
                    'reward_xp' => 30,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Green')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Bushy Type Achievements
        if (DB::table('achievements')->where('name', 'Dense Thickets')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Dense Thickets',
                    'description' => 'Find and photograph 6 plants with notably bushy or compact growth habits.',
                    'points_to_complete' => 6,
                    'reward_xp' => 30,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Bushy')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Bushy Habitats')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Bushy Habitats',
                    'description' => 'Document 4 bushy plants that provide shelter for wildlife or smaller plants.',
                    'points_to_complete' => 4,
                    'reward_xp' => 25,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Bushy')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Poisonous Type Achievements
        if (DB::table('achievements')->where('name', 'Toxic Beauty')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Toxic Beauty',
                    'description' => 'Carefully photograph 5 poisonous plants from a safe distance.',
                    'points_to_complete' => 5,
                    'reward_xp' => 45,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Poisonous')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Warning Signs')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Warning Signs',
                    'description' => 'Document 3 poisonous plants and the visual cues that warn of their toxicity.',
                    'points_to_complete' => 3,
                    'reward_xp' => 40,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Poisonous')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Tree Type Achievements
        if (DB::table('achievements')->where('name', 'Canopy Connections')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Canopy Connections',
                    'description' => 'Photograph 6 different tree species and their distinctive canopy shapes.',
                    'points_to_complete' => 6,
                    'reward_xp' => 30,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Tree')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Ancient Giants')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Ancient Giants',
                    'description' => 'Find and document 3 notably old or large tree specimens.',
                    'points_to_complete' => 3,
                    'reward_xp' => 45,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Tree')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Grass Type Achievements
        if (DB::table('achievements')->where('name', 'Graceful Grasses')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Graceful Grasses',
                    'description' => 'Document 7 different ornamental or wild grass species.',
                    'points_to_complete' => 7,
                    'reward_xp' => 30,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Grass')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Hidden in Plain Sight')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Hidden in Plain Sight',
                    'description' => 'Find and photograph 5 flowering grass species that most people overlook.',
                    'points_to_complete' => 5,
                    'reward_xp' => 35,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Grass')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Dangerous Type Achievements
        if (DB::table('achievements')->where('name', 'Hazard Hunter')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Hazard Hunter',
                    'description' => 'Safely document 4 plants that pose physical dangers like severe thorns or irritants.',
                    'points_to_complete' => 4,
                    'reward_xp' => 40,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Dangerous')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Beautiful but Deadly')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Beautiful but Deadly',
                    'description' => 'Photograph 3 plants that are both visually attractive and dangerous to handle.',
                    'points_to_complete' => 3,
                    'reward_xp' => 45,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Dangerous')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Rare Type Achievements
        if (DB::table('achievements')->where('name', 'Rare Treasures')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Rare Treasures',
                    'description' => 'Find and carefully document 5 plants that are considered rare in your region.',
                    'points_to_complete' => 5,
                    'reward_xp' => 50,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Rare')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Uncommon Discoveries')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Uncommon Discoveries',
                    'description' => 'Document 3 rare plants growing in unexpected or unusual locations.',
                    'points_to_complete' => 3,
                    'reward_xp' => 45,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Rare')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Endangered Type Achievements
        if (DB::table('achievements')->where('name', 'Conservation Photographer')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Conservation Photographer',
                    'description' => 'Respectfully photograph 3 endangered plant species without disturbing them.',
                    'points_to_complete' => 3,
                    'reward_xp' => 50,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Endangered')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Guardians of Diversity')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Guardians of Diversity',
                    'description' => 'Document 4 endangered plants and learn about conservation efforts to protect them.',
                    'points_to_complete' => 4,
                    'reward_xp' => 55,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Endangered')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Smooth Type Achievements
        if (DB::table('achievements')->where('name', 'Silky Surfaces')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Silky Surfaces',
                    'description' => 'Find and photograph 6 plants with notably smooth leaves or stems.',
                    'points_to_complete' => 6,
                    'reward_xp' => 25,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Smooth')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Smooth Operators')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Smooth Operators',
                    'description' => 'Document 5 plants with smooth adaptations that serve specific ecological purposes.',
                    'points_to_complete' => 5,
                    'reward_xp' => 30,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Smooth')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Wrinkly Type Achievements
        if (DB::table('achievements')->where('name', 'Textured Treasures')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Textured Treasures',
                    'description' => 'Photograph 7 plants with distinctively wrinkled or textured leaves.',
                    'points_to_complete' => 7,
                    'reward_xp' => 35,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Wrinkly')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Crinkle Collection')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Crinkle Collection',
                    'description' => 'Find 4 plants whose wrinkled surfaces help them survive in their environment.',
                    'points_to_complete' => 4,
                    'reward_xp' => 25,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Wrinkly')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Tiny Type Achievements
        if (DB::table('achievements')->where('name', 'Miniature Marvels')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Miniature Marvels',
                    'description' => 'Document 8 tiny plant species that are often overlooked.',
                    'points_to_complete' => 8,
                    'reward_xp' => 40,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Tiny')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Small but Mighty')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Small but Mighty',
                    'description' => 'Find 5 tiny plants with oversized ecological impact relative to their size.',
                    'points_to_complete' => 5,
                    'reward_xp' => 35,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Tiny')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Leaves Type Achievements
        if (DB::table('achievements')->where('name', 'Leaf Diversity')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Leaf Diversity',
                    'description' => 'Photograph 9 plants with distinctly different leaf shapes or arrangements.',
                    'points_to_complete' => 9,
                    'reward_xp' => 40,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Leaves')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Leaf Adaptations')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Leaf Adaptations',
                    'description' => 'Document 6 plants with specialized leaf adaptations for specific environments.',
                    'points_to_complete' => 6,
                    'reward_xp' => 35,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Leaves')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        // Flowers Type Achievements
        if (DB::table('achievements')->where('name', 'Bloom Explorer')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Bloom Explorer',
                    'description' => 'Find and photograph 10 different flowering plant species in full bloom.',
                    'points_to_complete' => 10,
                    'reward_xp' => 45,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Flowers')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }

        if (DB::table('achievements')->where('name', 'Flower Structure Study')->doesntExist()) {
            DB::table('achievements')->insert(
                [
                    'name' => 'Flower Structure Study',
                    'description' => 'Document 7 flowers with clearly visible reproductive structures.',
                    'points_to_complete' => 7,
                    'reward_xp' => 40,
                    'specie_type_id' => DB::table('specie_types')->where('name', 'Flowers')->first()->id,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}

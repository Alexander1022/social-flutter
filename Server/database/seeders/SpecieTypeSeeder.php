<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SpecieTypeSeeder extends Seeder
{
    public function run()
    {

        if (DB::table('specie_types')->where('name', 'Purple')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Purple',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Red')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Red',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Colourful')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Colourful',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'White')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'White',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Spiky')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Spiky',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Long')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Long',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Thin')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Thin',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Smelly')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Smelly',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Green')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Green',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Bushy')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Bushy',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Poisonous')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Poisonous',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Tree')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Tree',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Grass')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Grass',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Dangerous')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Dangerous',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Rare')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Rare',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Endangered')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Endangered',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Smooth')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Smooth',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Wrinkly')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Wrinkly',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Tiny')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Tiny',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Leaves')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Leaves',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Flowers')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Flowers',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Fruit')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Fruit',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Endangered')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Endangered',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Big')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Big',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Small')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Small',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Slimy')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Slimy',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Striped')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Striped',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Spotted')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Spotted',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Colour-changing')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Colour-changing',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Colorful')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Colorful',   
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Color-changing')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Color-changing',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Legs')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Legs',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Endangered')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Endangered',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Fluffy')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Fluffy',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Furry')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Furry',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Floppy')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Floppy',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Pointy')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Pointy',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Walks')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Walks',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Swims')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Swims',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Slithers')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Slithers',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Flies')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Flies',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Vertebrates')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Vertebrates',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Invertebrates')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Invertebrates',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Lungs')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Lungs',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Gills')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Gills',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Wings')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Wings',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Fins')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Fins',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Trachea')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Trachea',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }if (DB::table('specie_types')->where('name', 'Multicellular')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Multicellular',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }if (DB::table('specie_types')->where('name', 'Herbs')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Herbs',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }if (DB::table('specie_types')->where('name', 'Endangered')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Endangered',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }if (DB::table('specie_types')->where('name', 'Vascular')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Vascular',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }if (DB::table('specie_types')->where('name', 'Decomposer')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Decomposer',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }if (DB::table('specie_types')->where('name', 'Omnivore')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Omnivore',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }if (DB::table('specie_types')->where('name', 'Carnivore')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Carnivore',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }if (DB::table('specie_types')->where('name', 'Herbivore')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Herbivore',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        
        if (DB::table('specie_types')->where('name', 'Waterfowl')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Waterfowl',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Marine Mammal')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Marine Mammal',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('specie_types')->where('name', 'Fish')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Fish',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }if (DB::table('specie_types')->where('name', 'Insect')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Insect',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }if (DB::table('specie_types')->where('name', 'Reptile')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Reptile',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }if (DB::table('specie_types')->where('name', 'Amphibian')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Amphibian',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }if (DB::table('specie_types')->where('name', 'Bird')->doesntExist()) {
            DB::table('specie_types')->insert(
                [
                    'name' => 'Bird',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}

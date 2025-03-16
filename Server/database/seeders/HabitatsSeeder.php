<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnimalKingdomsSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('habitats')->where('name', 'Forest')->doesntExist()) {
            DB::table('habitats')->insert(
                [
                    'name' => 'Forest',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            );
        }
        if (
            DB::table('habitats')->where('name', 'Forest')
                ->orWhere('name', 'Jungle')
                ->orWhere('name', 'Savanna')
                ->orWhere('name', 'Grassland')
                ->orWhere('name', 'Rocky Areas')
                ->orWhere('name', 'Caves & Subterranean')
                ->orWhere('name', 'Desert')
                ->orWhere('name', 'Marine')

                ->doesntExist()
        ) {
            DB::table('habitats')->insert([
                [
                    'name' => 'Plants',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Animals',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'Mushrooms',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
}

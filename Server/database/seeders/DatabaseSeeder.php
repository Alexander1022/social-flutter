<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\AnimalKingdomsSeeder;
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            AnimalKingdomsSeeder::class,
            FileTypesSeeder::class,
            SpecieTypeSeeder::class,
            HabitatsSeeder::class,
            AchievementsSeeder::class,
        ]);
    }
}

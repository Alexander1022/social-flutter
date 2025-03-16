<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HabitatsSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('habitats')->where('name', 'Forest')->doesntExist()) {
            DB::table('habitats')->insert(
                [
                    'name' => 'Forest',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('habitats')->where('name', 'Jungle')->doesntExist()) {
            DB::table('habitats')->insert(
                [
                    'name' => 'Jungle',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('habitats')->where('name', 'Savanna')->doesntExist()) {
            DB::table('habitats')->insert(
                [
                    'name' => 'Savanna',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('habitats')->where('name', 'Grassland')->doesntExist()) {
            DB::table('habitats')->insert(
                [
                    'name' => 'Grassland',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('habitats')->where('name', 'Rocky Areas')->doesntExist()) {
            DB::table('habitats')->insert(
                [
                    'name' => 'Rocky Areas',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('habitats')->where('name', 'Caves & Subterranean')->doesntExist()) {
            DB::table('habitats')->insert(
                [
                    'name' => 'Caves & Subterranean',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('habitats')->where('name', 'Desert')->doesntExist()) {
            DB::table('habitats')->insert(
                [
                    'name' => 'Desert',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('habitats')->where('name', 'Marine')->doesntExist()) {
            DB::table('habitats')->insert(
                [
                    'name' => 'Marine',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        if (DB::table('habitats')->where('name', 'Coastal')->doesntExist()) {
            DB::table('habitats')->insert(
                [
                    'name' => 'Coastal',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]
            );
        }
        
    }
}

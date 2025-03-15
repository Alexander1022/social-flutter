<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnimalKingdomsSeeder extends Seeder
{
    public function run()
    {
        if (
            DB::table('animal_kingdoms')->where('name', 'Plants')
                ->orWhere('name', 'Animals')
                ->orWhere('name', 'Mushrooms')
                ->doesntExist()
        ) {
            DB::table('animal_kingdoms')->insert([
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

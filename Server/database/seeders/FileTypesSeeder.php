<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FileTypesSeeder extends Seeder
{
    public function run()
    {
        if (DB::table('file_types')->doesntExist()) {
            DB::table('file_types')->insert([
                [
                    'name' => 'image',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => 'text',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
}

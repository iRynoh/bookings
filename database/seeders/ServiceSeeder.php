<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('services')->insert([
            'name' => 'Laravel training',
            'duration' => 30,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('services')->insert([
            'name' => 'NodeJS training',
            'duration' => 30,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

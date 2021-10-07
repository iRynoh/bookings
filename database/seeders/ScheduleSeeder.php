<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            'employee_id' => 1,
            'date' => now(),
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('schedules')->insert([
            'employee_id' => 1,
            'date' => now()->addDay(),
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('schedules')->insert([
            'employee_id' => 1,
            'date' => now()->addDays(2),
            'start_time' => '09:00:00',
            'end_time' => '17:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('schedules')->insert([
            'employee_id' => 2,
            'date' => now()->addDay(),
            'start_time' => '10:00:00',
            'end_time' => '15:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('schedules')->insert([
            'employee_id' => 2,
            'date' => now()->addDays(2),
            'start_time' => '10:00:00',
            'end_time' => '15:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

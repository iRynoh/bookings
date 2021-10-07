<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleUnavailabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedule_unavailabilities')->insert([
            'schedule_id' => 2,
            'start_time' => '12:00:00',
            'end_time' => '13:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

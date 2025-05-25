<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TournamentsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tournaments')->insert([
            [
                'name' => 'Spring Cup',
                'team_id' => 5,
                'event' => 'Spring Event',
                'date' => now()->toDateString(),
                'time' => now()->toTimeString(),
                'result' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

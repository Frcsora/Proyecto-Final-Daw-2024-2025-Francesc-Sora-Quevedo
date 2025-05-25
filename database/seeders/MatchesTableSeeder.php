<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatchesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('matches')->insert([
            [
                'date' => now()->toDateString(),
                'time' => now()->toTimeString(),
                'tournaments_id' => 2,
                'rival' => 'Team Beta',
                'best_of' => 'BO3',
                'result' => 'Pendiente',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

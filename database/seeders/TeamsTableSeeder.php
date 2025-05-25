<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('teams')->insert([
            [
                'created_by' => 20,
                'name' => 'Team Alpha',
                'game_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'created_by' => 20,
                'name' => 'Team Beta',
                'game_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

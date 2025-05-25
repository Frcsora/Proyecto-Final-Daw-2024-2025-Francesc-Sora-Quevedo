<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('games')->insert([
            ['name' => 'League of Legends', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Valorant', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

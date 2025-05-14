<?php

namespace Database\Seeders;

use App\Models\Games;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $games = ['League of legends', 'Valorant'];
        foreach ($games as $game) {
            Games::firstOrCreate(
                ['name' => $game],
                ['name' => $game]
            );
        }

    }
}

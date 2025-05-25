<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayersMediasTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('players_medias')->insert([
            [
                'player_id' => 1,
                'media_id' => 1,
                'name' => 'Twitter',
                'link' => 'https://twitter.com/elpro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsMediasTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('teams_medias')->insert([
            [
                'team_id' => 1,
                'media_id' => 1,
                'name' => 'Twitter',
                'link' => 'https://twitter.com/teamalpha',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
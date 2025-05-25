<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('players')->insert([
            [
                'created_by' => 20,
                'name' => 'Juan',
                'surname1' => 'Pérez',
                'surname2' => 'García',
                'nickname' => 'ElPro',
                'image' => '',
                'team_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

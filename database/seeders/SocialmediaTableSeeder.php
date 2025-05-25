<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialmediaTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('socialmedia')->insert([
            [
                'created_by' => 20,
                'id_media' => 1,
                'name' => 'Twitter',
                'link' => 'https://twitter.com/teamalpha',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

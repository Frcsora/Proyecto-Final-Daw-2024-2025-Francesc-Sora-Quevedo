<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SponsorsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sponsors')->insert([
            [
                'created_by' => 20,
                'name' => 'Sponsor1',
                'link' => 'https://sponsor.com',
                'tier' => '1',
                'base64' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

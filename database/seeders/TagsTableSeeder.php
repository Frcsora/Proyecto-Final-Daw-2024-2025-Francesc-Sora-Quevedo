<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tags')->insert([
            ['tag' => 'eSports', 'created_at' => now(), 'updated_at' => now()],
            ['tag' => 'Noticias', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}

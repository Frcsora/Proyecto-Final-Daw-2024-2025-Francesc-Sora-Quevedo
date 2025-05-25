<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTagsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('news_tags')->insert([
            [
                'news_id' => 1,
                'tag_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
<?php

namespace Database\Seeders;

use App\Models\Tags;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['Actualidad', 'PioPioeSports', 'Noticias'];

        foreach ($tags as $tag) {
            Tags::firstOrCreate(
                ['tag' => $tag],
                ['tag' => $tag]
            );
        }
    }
}

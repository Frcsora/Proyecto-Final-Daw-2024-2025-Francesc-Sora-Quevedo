<?php

namespace Database\Seeders;

use App\Models\Medias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medias::insert([
            [
                'name' => 'X',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free ... --><path d="M389.2 ..."/></svg>',
            ],
            [
                'name' => 'Facebook',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free ...--><path d="M512 ..."/></svg>',
            ],
            [
                'name' => 'Instagram',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free ...--><path d="M224.1 ..."/></svg>',
            ],
            [
                'name' => 'Tik tok',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free ...--><path d="M448 ..."/></svg>',
            ],
            [
                'name' => 'Youtube',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free ...--><path d="M549.7 ..."/></svg>',
            ],
            [
                'name' => 'Twitch',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free ...--><path d="M391.2 ..."/></svg>',
            ],
            [
                'name' => 'Kick',
                'svg' => '<svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Kick</title><path d="M1.333 ..."/></svg>',
            ],
            [
                'name' => 'Patreon',
                'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free ...--><path d="M489.7 ..."/></svg>',
            ]
        ]);
    }
}

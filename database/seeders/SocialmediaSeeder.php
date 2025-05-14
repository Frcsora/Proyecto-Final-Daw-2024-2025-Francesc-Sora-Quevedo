<?php

namespace Database\Seeders;

use App\Models\Socialmedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialmediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Socialmedia::firstOrCreate(
            ['id' => 1],
            [
                'created_by' => 1,
                'id_media' => 1,
                'name' => 'Twitter',
                'link' => 'https://x.com/PioPioEC'
            ]
        );
        Socialmedia::firstOrCreate(
            ['id' => 2],
            [
                'created_by' => 1,
                'id_media' => 3,
                'name' => 'Instagram',
                'link' => 'https://www.instagram.com/piopioec/'
            ]
        );
        Socialmedia::firstOrCreate(
            ['id' => 3],
            [
                'created_by' => 1,
                'id_media' => 4,
                'name' => 'Tik Tok',
                'link' => 'https://www.tiktok.com/@piopioesportsclub'
            ]
        );
    }
}

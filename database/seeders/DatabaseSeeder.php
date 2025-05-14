<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(MediasSeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(GamesSeeder::class);
        $this->call(NewsSeeeder::class);
    }
}

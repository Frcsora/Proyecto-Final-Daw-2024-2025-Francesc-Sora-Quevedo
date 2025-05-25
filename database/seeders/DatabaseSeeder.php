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
        /*$this->call([
            UsersTableSeeder::class,
            GamesTableSeeder::class,
            TeamsTableSeeder::class,
            TournamentsTableSeeder::class,
            MatchesTableSeeder::class,
            MediasSeeder::class,
            NewsTableSeeder::class,
            TagsTableSeeder::class,
            //NewsTagsTableSeeder::class,
            ImagesTableSeeder::class,
            PlayersTableSeeder::class,
            //PlayersMediasTableSeeder::class,
            SocialmediaTableSeeder::class,
            SponsorsTableSeeder::class,
            //TeamsMediasTableSeeder::class,
        ]);*/
        $this->call(UserSeeder::class);
        $this->call(MediasSeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(GamesSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(SocialmediaSeeder::class);
    }
}

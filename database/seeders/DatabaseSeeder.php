<?php

namespace Database\Seeders;

use App\Models\ArtistProfile;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AdminSeeder::class,
            ArtistSeeder::class,
            ArtistProfileSeeder::class,
            // PostsSeeder::class,
        ]);
    }
}

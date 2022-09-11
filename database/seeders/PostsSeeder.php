<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Posts')->insert([
            [
                'artist_profile_id' => 1,
            ],
            [
                'artist_profile_id' => 1,
            ],
            [
                'artist_profile_id' => 1,
            ],
        ]);
    }
}

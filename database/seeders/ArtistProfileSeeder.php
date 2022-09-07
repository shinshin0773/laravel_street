<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artist_profiles')->insert([
            [
                'artist_id' => '1',
                'name' => 'Shin',
                'information' => 'Shinです毎日ライブを梅田で開催しています',
                'filename' => '',
            ],
            [
                'artist_id' => '2',
                'name' => 'Hide',
                'information' => 'Hideです。毎日のライブ楽しいです',
                'filename' => '',
            ],
            [
                'artist_id' => '3',
                'name' => 'daitou',
                'information' => 'daitouです。毎日楽しいです',
                'filename' => '',
            ]
        ],);
    }
}

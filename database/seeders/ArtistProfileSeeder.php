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
                'sns_account' => 'shinshin@twitter',
                'file_path' => 'storage/postImage/プロローグ(Uru) _ ANFiNY KAZUKI　2019_04_16　新宿ソロ路上.jpeg',
            ],
            [
                'artist_id' => '2',
                'name' => 'Hide',
                'information' => 'Hideです。毎日のライブ楽しいです',
                'sns_account' => 'hidechan@hide',
                'file_path' => 'storage/postImage/subaru 柏駅路上ライブ.jpeg',
            ],
            [
                'artist_id' => '3',
                'name' => 'daitou',
                'information' => 'daitouです。毎日楽しいです',
                'sns_account' => 'daitou@daidai',
                'file_path' => 'storage/postImage/top.jpeg',
            ]
        ],);
    }
}

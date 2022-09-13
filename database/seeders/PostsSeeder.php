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
                'name' => 'しん',
                'artist_profile_id' => 1,
                'information' => '大阪の街を盛り上げます！！今夜7時から！',
                'place' => '大阪駅',
                'holding_time' => '2022-09-28 17:30:00',
                'finish_time' => '2022-09-28 21:00:00',
                'file_path' => 'storage/postImage/subaru 柏駅路上ライブ.jpeg',
            ],
            [
                'name' => 'HIDEKI',
                'artist_profile_id' => 2,
                'information' => '神戸の街を盛り上げます！！今夜7時から！',
                'place' => '三ノ宮駅',
                'holding_time' => '2022-10-03 17:30:00',
                'finish_time' => '2022-10-03 21:00:00',
                'file_path' => 'storage/postImage/プロローグ(Uru) _ ANFiNY KAZUKI　2019_04_16　新宿ソロ路上.jpeg',
            ],
            [
                'name' => 'DAITO',
                'artist_profile_id' => 3,
                'information' => '西宮の街を盛り上げます！！今夜7時から！',
                'place' => '西宮駅',
                'holding_time' => '2022-10-08 17:30:00',
                'finish_time' => '2022-10-08 21:00:00',
                'file_path' => 'storage/postImage/top.jpeg',
            ],
        ]);
    }
}

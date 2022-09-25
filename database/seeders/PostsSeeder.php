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
                'name' => 'Shin',
                'artist_profile_id' => 1,
                'information' => '元町駅東口あたりで開催します！！',
                'place' => '元町駅',
                'lat' => 34.6904121,
                'lng' => 135.1891484,
                'like' => 1,
                'holding_time' => '2022-09-28 19:30:00',
                'finish_time' => '2022-09-28 21:00:00',
                'file_path' => 'storage/postImage/路上ライブ-15.jpeg',
            ],
            [
                'name' => 'Himena',
                'artist_profile_id' => 2,
                'information' => '神戸の街を盛り上げます！！今夜7時から！',
                'place' => '三ノ宮駅',
                'lat' => 34.694386,
                'lng' => 135.1913645,
                'like' => 2,
                'holding_time' => '2022-10-03 19:30:00',
                'finish_time' => '2022-10-03 21:00:00',
                'file_path' => 'storage/postImage/幾田りら__☺︎_.jpeg',
            ],
            [
                'name' => 'DAITO',
                'artist_profile_id' => 3,
                'information' => '西宮の街を盛り上げます！！今夜21時から！',
                'place' => '西宮駅',
                'lat' => 34.7387817,
                'lng' => 135.3482891,
                'like' => 4,
                'holding_time' => '2022-10-08 21:00:00',
                'finish_time' => '2022-10-08 23:00:00',
                'file_path' => 'storage/postImage/top.jpeg',
            ],
            [
                'name' => 'Tagawat',
                'artist_profile_id' => 4,
                'information' => '海の家を盛り上げます！！みんな来てな！',
                'place' => '須磨海水浴場',
                'lat' => 34.6435375,
                'lng' => 135.1247724,
                'like' => 8,
                'holding_time' => '2022-10-11 12:30:00',
                'finish_time' => '2022-10-11 14:00:00',
                'file_path' => 'storage/postImage/プロローグ(Uru) _ ANFiNY KAZUKI　2019_04_16　新宿ソロ路上.jpeg',
            ],
            [
                'name' => 'Hide',
                'artist_profile_id' => 5,
                'information' => '毎日盛り上げます！！みんな来てな！',
                'place' => '三宮駅',
                'lat' => 34.694387,
                'lng' => 135.1913648,
                'like' => 10,
                'holding_time' => '2022-11-03 17:30:00',
                'finish_time' => '2022-11-3 21:00:00',
                'file_path' => 'storage/postImage/路上ライブフリー3.jpeg',
            ],
            [
                'name' => 'tagawawa',
                'artist_profile_id' => 6,
                'information' => '楽しませます！！みんな来てな！',
                'place' => '神戸三宮駅',
                'lat' => 34.6931384,
                'lng' => 135.1916067,
                'like' => 12,
                'holding_time' => '2022-10-02 18:30:00',
                'finish_time' => '2022-10-02 21:00:00',
                'file_path' => 'storage/postImage/artist7.jpg',
            ],
            [
                'name' => 'Kuwatata',
                'artist_profile_id' => 7,
                'information' => '花時計駅前で開催します',
                'place' => '花時計駅前',
                'lat' => 34.6921081,
                'lng' => 135.193732,
                'like' => 19,
                'holding_time' => '2022-09-25 17:30:00',
                'finish_time' => '2022-09-25 21:00:00',
                'file_path' => 'storage/postImage/chizu on Twitter.jpeg',
            ],
            [
                'name' => 'Shin',
                'artist_profile_id' => 1,
                'information' => '三ノ宮の街を盛り上げます！！今夜8時から！',
                'place' => '大阪駅',
                'lat' => 34.6931081,
                'lng' => 135.193732,
                'like' => 19,
                'holding_time' => '2022-09-27 20:30:00',
                'finish_time' => '2022-09-27 21:30:00',
                'file_path' => 'storage/postImage/artist1.jpg',
            ],
            [
                'name' => 'Himena',
                'artist_profile_id' => 2,
                'information' => '神戸の街を盛り上げます！！今夜7時から！',
                'place' => '三ノ宮駅',
                'lat' => 34.684357,
                'lng' => 135.1913765,
                'like' => 19,
                'holding_time' => '2022-10-08 17:30:00',
                'finish_time' => '2022-10-08 21:00:00',
                'file_path' => 'storage/postImage/幾田りら__☺︎_.jpeg',
            ],
            [
                'name' => 'DAITO',
                'artist_profile_id' => 3,
                'information' => '西宮の街を盛り上げます！！今夜17時から！',
                'place' => '西宮駅',
                'lat' => 34.654278,
                'lng' => 135.1913325,
                'like' => 19,
                'holding_time' => '2022-10-10 17:00:00',
                'finish_time' => '2022-10-08 21:00:00',
                'file_path' => 'storage/postImage/artist3.jpg',
            ],
            [
                'name' => 'Tagawat',
                'artist_profile_id' => 4,
                'information' => '海の家を盛り上げます！！みんな来てな！',
                'place' => '須磨海水浴場',
                'lat' => 34.697375,
                'lng' => 135.1913652,
                'like' => 19,
                'holding_time' => '2022-10-5 17:30:00',
                'finish_time' => '2022-10-11 21:00:00',
                'file_path' => 'storage/postImage/artist4.jpg',
            ],
            [
                'name' => 'Hide',
                'artist_profile_id' => 5,
                'information' => '毎日盛り上げます！！みんな来てな！',
                'place' => '三宮駅',
                'lat' => 34.693255,
                'lng' => 135.1913649,
                'like' => 19,
                'holding_time' => '2022-10-13 21:30:00',
                'finish_time' => '2022-10-13 21:00:00',
                'file_path' => 'storage/postImage/artist6.jpg',
            ],
            [
                'name' => 'tagawawa',
                'artist_profile_id' => 6,
                'information' => '盛り上げます！！みんな来てな！',
                'place' => '三宮駅',
                'lat' => 34.625435,
                'lng' => 135.1913672,
                'like' => 19,
                'holding_time' => '2022-10-13 17:30:00',
                'finish_time' => '2022-10-13 21:00:00',
                'file_path' => 'storage/postImage/artist1.jpg',
            ],
            [
                'name' => 'Kuwatata',
                'artist_profile_id' => 7,
                'information' => '姫路でやってます！みんな来てください！',
                'place' => '姫路駅前',
                'lat' => 34.696299,
                'lng' => 135.1913632,
                'like' => 19,
                'holding_time' => '2022-10-21 18:30:00',
                'finish_time' => '2022-10-11 21:00:00',
                'file_path' => 'storage/postImage/artist2.jpg',
            ],
            [
                'name' => 'きゃない',
                'artist_profile_id' => 7,
                'information' => '
                きゃない　大阪味園ユニバースにて開催の「MUSIC CHAKRA!」でのグッズ販売は開場後15時より行います！
                大阪味園ユニバースにて開催の「MUSIC CHAKRA!」でのグッズ販売は開場後15時より行います！
                大阪味園ユニバースにて開催の「MUSIC CHAKRA!」でのグッズ販売は開場後15時より行います！
                よろしくお願いします！！！！',
                'place' => '大阪味園',
                'lat' => 34.6922391,
                'lng' => 135.1913655,
                'like' => 19,
                'holding_time' => '2022-10-13 18:30:00',
                'finish_time' => '2022-10-13 21:00:00',
                'file_path' => 'storage/postImage/kyanai.jpg',
            ],
        ]);
    }
}

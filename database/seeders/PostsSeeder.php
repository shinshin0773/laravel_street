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
        DB::table('posts')->insert([
            [
              'name' => 'Himena',
              'artist_profile_id' => 2,
              'information' => '三ノ宮の街を盛り上げます！！今夜7時から！',
              'place' => '三ノ宮駅',
              'lat' => 34.694386,
              'lng' => 135.1913645,
              'like' => 2,
              'holding_time' => '2023-02-03 19:30:00',
              'finish_time' => '2023-02-03 21:00:00',
              'file_path' => 'storage/postImage/幾田りら__☺︎_.jpeg',
              'created_at' => '2022-12-03 00:17:05',
            ],
            [
              'name' => 'DAITO',
              'artist_profile_id' => 3,
              'information' => '西宮の街を盛り上げます！！今夜21時から！',
              'place' => '西宮駅',
              'lat' => 34.7369026,
              'lng' => 135.3370718,
              'like' => 4,
              'holding_time' => '2023-02-08 21:00:00',
              'finish_time' => '2023-02-08 23:00:00',
              'file_path' => 'storage/postImage/top.jpeg',
              'created_at' => '2022-12-05 00:17:05',
            ],
            [
              'name' => 'tagawawa',
              'artist_profile_id' => 6,
              'information' => '渋谷駅で7時から開催します！！',
              'place' => '渋谷駅ハチ公前',
              'lat' => 35.6585502,
              'lng' => 139.6985576,
              'like' => 19,
              'holding_time' => '2023-02-5 17:30:00',
              'finish_time' => '2023-02-11 21:00:00',
              'file_path' => 'storage/postImage/artist7.jpg',
              'created_at' => '2022-12-08 00:17:05',
            ],
            [
              'name' => 'Kuwatata',
              'artist_profile_id' => 7,
              'information' => '新宿毎日盛り上げます！！みんな来てな！',
              'place' => '新宿御苑前',
              'lat' => 35.6887939,
              'lng' => 139.7105766,
              'like' => 19,
              'holding_time' => '2023-02-13 21:30:00',
              'finish_time' => '2023-02-13 22:00:00',
              'file_path' => 'storage/postImage/chizu on Twitter.jpeg',
              'created_at' => '2022-12-10 00:17:05',
            ],
            [
              'name' => 'Shin',
              'artist_profile_id' => 1,
              'information' => '三ノ宮の街を盛り上げます！！今夜8時から！',
              'place' => '大阪駅',
              'lat' => 34.6931081,
              'lng' => 135.193732,
              'like' => 19,
      'holding_time' => '2023-02-13 21:30:00',
              'finish_time' => '2023-02-13 22:00:00',
              'file_path' => 'storage/postImage/chizu on Twitter.jpeg',
              'created_at' => '2022-12-12 00:17:05',
            ],
            [
              'name' => 'Shin',
              'artist_profile_id' => 1,
              'information' => '三ノ宮の街を盛り上げます！！今夜8時から！',
              'place' => '大阪駅',
              'lat' => 34.6931081,
              'lng' => 135.193732,
              'like' => 19,
              'holding_time' => '2023-02-27 20:30:00',
              'finish_time' => '2023-02-27 21:30:00',
              'file_path' => 'storage/postImage/artist1.jpg',
              'created_at' => '2022-12-14 00:17:05',
            ],
            [
              'name' => 'Himena',
              'artist_profile_id' => 2,
              'information' => '神戸の街を盛り上げます！！今夜7時から！',
              'place' => '三ノ宮駅',
              'lat' => 34.684357,
              'lng' => 135.1913765,
              'like' => 19,
              'holding_time' => '2023-02-08 17:30:00',
              'finish_time' => '2023-02-08 21:00:00',
              'file_path' => 'storage/postImage/幾田りら__☺︎_.jpeg',
              'created_at' => '2022-12-16 00:17:05',
            ],
            [
              'name' => 'DAITO',
              'artist_profile_id' => 3,
              'information' => '西宮の街を盛り上げます！！今夜17時から！',
              'place' => '西宮駅',
              'lat' => 34.7363479,
              'lng' => 135.3331155,
              'like' => 19,
              'holding_time' => '2023-02-10 17:00:00',
              'finish_time' => '2023-02-08 21:00:00',
              'file_path' => 'storage/postImage/artist3.jpg',
              'created_at' => '2022-12-19 00:17:05',
            ],
            [
              'name' => 'tagawawa',
              'artist_profile_id' => 6,
              'information' => '盛り上げます！！みんな来てな！',
              'place' => '三宮駅',
              'lat' => 34.6946063,
              'lng' => 135.1883711,
              'like' => 19,
              'holding_time' => '2023-02-13 17:30:00',
              'finish_time' => '2023-02-13 21:00:00',
              'file_path' => 'storage/postImage/artist1.jpg',
              'created_at' => '2022-12-20 00:17:05',
            ],
            [
              'name' => 'Kuwatata',
              'artist_profile_id' => 7,
              'information' => '姫路でやってます！みんな来てください！',
              'place' => '姫路駅前',
              'lat' => 34.696299,
              'lng' => 135.1913632,
              'like' => 19,
              'holding_time' => '2023-02-21 18:30:00',
              'finish_time' => '2023-02-11 21:00:00',
              'file_path' => 'storage/postImage/artist2.jpg',
              'created_at' => '2022-12-21 00:17:05',
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
              'holding_time' => '2023-02-13 18:30:00',
              'finish_time' => '2023-02-13 21:00:00',
              'file_path' => 'storage/postImage/kyanai.jpg',
              'created_at' => '2022-12-23 00:17:05',
            ],
          ]);
        }
}

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
                'information' => 'Shinです!!毎日ライブを梅田で開催しています',
                'sns_account' => 'shinshin@twitter',
                'file_path' => 'storage/postImage/プロローグ(Uru) _ ANFiNY KAZUKI　2019_04_16　新宿ソロ路上.jpeg',
            ],
            [
                'artist_id' => '2',
                'name' => 'Himena',
                'information' => 'HiMeです!!毎日の福岡で開催しています',
                'sns_account' => 'himenachan@hide',
                'file_path' => 'storage/postImage/スマホ人間.png',
            ],
            [
                'artist_id' => '3',
                'name' => 'daitou',
                'information' => 'daitouです!毎日楽しいです~!',
                'sns_account' => 'daitou@daidai',
                'file_path' => 'storage/postImage/top.jpeg',
            ],
            [
                'artist_id' => '4',
                'name' => 'Ryu',
                'information' => 'Ryuです!!!毎日開催してます',
                'sns_account' => 'Ryu@daidai',
                'file_path' => 'storage/postImage/路上ライブ-15.jpeg',
            ],
            [
                'artist_id' => '5',
                'name' => 'Hide',
                'information' => 'Hideです!!毎日大阪駅前で開催しています',
                'sns_account' => 'Hide@hidehide',
                'file_path' => 'storage/postImage/路上ライブフリー5.jpeg',
            ],
            [
                'artist_id' => '6',
                'name' => 'Tagawat',
                'information' => 'Tagawatです！！SNSフォローお願いします！！！',
                'sns_account' => 'Ryunosuke@ryuuu',
                'file_path' => 'storage/postImage/chizu on Twitter.jpeg',
            ],
            [
                'artist_id' => '7',
                'name' => 'Kuwa',
                'information' => 'Kuwaです！！SNSフォローお願いします！！！',
                'sns_account' => 'Kuwa@ryuuu',
                'file_path' => 'storage/postImage/薮内 竜馬｜音楽サイト itadaki 登録アーティスト紹介.jpeg',
            ],
        ],);
    }
}

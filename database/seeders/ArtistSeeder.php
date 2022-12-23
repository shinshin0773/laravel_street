<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use SebastianBergmann\Type\FalseType;

use function Ramsey\Uuid\v1;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert([
            [
                'name' => 'Shin',
                'email' => 'test1@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'recognized' => True,
                'created_at' => '2022/07/03 11:11:11'
            ],
            [
                'name' => 'Hime',
                'email' => 'test2@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'recognized' => False,
                'created_at' => '2022/05/01 11:11:11'
            ],
            [
                'name' => 'Daitou',
                'email' => 'test3@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'recognized' => True,
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'Ryu',
                'email' => 'test4@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'recognized' => False,
                'created_at' => '2020/01/01 11:11:11'
            ],
            [
                'name' => 'Hide',
                'email' => 'test5@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'recognized' => True,
                'created_at' => '2020/03/01 11:11:11'
            ],
            [
                'name' => 'Tagawa',
                'email' => 'test6@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'recognized' => True,
                'created_at' => '2020/08/01 11:11:11'
            ],
            [
                'name' => 'Kuwa',
                'email' => 'test7@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'recognized' => False,
                'created_at' => '2020/09/01 11:11:11'
            ],
        ]);
    }
}

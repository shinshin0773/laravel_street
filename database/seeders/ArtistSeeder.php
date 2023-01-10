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
                'userId' => 'test1@test.com',
                'email' => 'test1@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'recognized' => True,
                'created_at' => '2022/07/03 11:11:11'
            ],
            [
                'name' => 'Hime',
                'userId' => 'test2@test.com',
                'email' => 'test2@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'recognized' => False,
                'created_at' => '2022/05/01 11:11:11'
            ],
            [
                'name' => 'Daitou',
                'userId' => 'test3@test.com',
                'email' => 'test3@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'recognized' => True,
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'Ryu',
                'userId' => 'test4@test.com',
                'email' => 'test4@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'recognized' => False,
                'created_at' => '2020/01/01 11:11:11'
            ],
            [
                'name' => 'Hide',
                'userId' => 'test5@test.com',
                'email' => 'test5@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'recognized' => True,
                'created_at' => '2020/03/01 11:11:11'
            ],
            [
                'name' => 'Tagawa',
                'userId' => 'test6@test.com',
                'email' => 'test6@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'recognized' => True,
                'created_at' => '2020/08/01 11:11:11'
            ],
            [
                'name' => 'Kuwa',
                'userId' => 'test7@test.com',
                'email' => 'test7@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'recognized' => False,
                'created_at' => '2020/09/01 11:11:11'
            ],
        ]);
    }
}

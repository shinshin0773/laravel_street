<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
         [
            'name' => 'test1',
            'userId' => 'test1@test.com',
            'password' => Hash::make('password123'), //Hashは暗号化
            'created_at' => '2021/01/01 11:11:11'
        ],
        [
            'name' => 'test2',
            'userId' => 'test2@test.com',
            'password' => Hash::make('password123'), //Hashは暗号化
            'created_at' => '2021/01/01 11:11:11'
        ],
        [
            'name' => 'test3',
            'userId' => 'test3@test.com',
            'password' => Hash::make('password123'), //Hashは暗号化
            'created_at' => '2021/01/01 11:11:11'
        ],
        [
            'name' => 'test4',
            'userId' => 'test4@test.com',
            'password' => Hash::make('password123'), //Hashは暗号化
            'created_at' => '2021/01/01 11:11:11'
        ]
    ]);
    }
}

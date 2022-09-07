<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'Hide',
                'email' => 'test2@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'Daitou',
                'email' => 'test3@test.com',
                'password' => Hash::make('password123'), //Hashは暗号化
                'created_at' => '2021/01/01 11:11:11'
            ],
        ]);
    }
}

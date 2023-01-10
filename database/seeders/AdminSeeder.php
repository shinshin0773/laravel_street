<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //->insert()ダミーデータを作成できる
        DB::table('admins')->insert([
            'name' => '管理者Shin',
            'userId' => 'admin-shin3333',
            'password' => Hash::make('password123'), //Hashは暗号化
            'created_at' => '2021/01/01 11:11:11'
        ]);
    }
}

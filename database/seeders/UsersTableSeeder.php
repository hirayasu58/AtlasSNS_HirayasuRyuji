<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// ↑このファイル内でDB::が使えるようになる
use Illuminate\Support\Facades\Hash;
// ↑Hashを使えるようにする。Authを入れてたら暗号化ではなく、Hashを使用する

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'Atlas一郎',
            'email' => 'atlas1@atlas.com',
            'password' => Hash::make('pass0001')], //引数のパスワードをHashクラスに生成する
            ['username' => 'Atlas二郎',
            'email' => 'atlas2@atlas.com',
            'password' => Hash::make('pass0002')],
            ['username' => 'Atlas三郎',
            'email' => 'atlas3@atlas.com',
            'password' => Hash::make('pass0003')],
            ['username' => 'Atlas四郎',
            'email' => 'atlas4@atlas.com',
            'password' => Hash::make('pass0004')],
            ['username' => 'Atlas五郎',
            'email' => 'atlas5@atlas.com',
            'password' => Hash::make('pass0005')]
        ]);
    }
}

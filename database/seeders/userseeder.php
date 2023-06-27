<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'dafa',
            'email' => 'dafaprstya150@gmail.com',
            'role'=>'admin',
            'password' => bcrypt('dafaprstya'),
        ]);
        DB::table('users')->insert([
            'name' => 'clarisa pearce',
            'email' => 'marcuspearce150@gmail.com',
            'role'=>'dokter',
            'password' => bcrypt('dafaprstya'),
        ]);
    }
}

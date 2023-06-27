<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Generator as faker;
use Mockery\Generator\StringManipulation\Pass\Pass;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class seederkamar extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('kamars')->insert([
            'nama_kamar' => 'Kamar anggrek',
            'kelas' => 'I',
            'Harga' => '502',
            'terisi' => 'ya',
        ]);
        DB::table('kamars')->insert([
            'nama_kamar' => 'Kamar matahari',
            'kelas' => 'II',
            'Harga' => '352',
            'terisi' => 'ya',
        ]);
        DB::table('kamars')->insert([
            'nama_kamar' => 'Kamar santuy',
            'kelas' => 'III',
            'Harga' => '302',
            'terisi' => 'ya'
        ]);
        DB::table('kamars')->insert([
            'nama_kamar' => 'Kamar keren',
            'kelas' => 'II',
            'Harga' => '352'
        ]);
        DB::table('kamars')->insert([
            'nama_kamar' => 'Kamar asik',
            'kelas' => 'I',
            'Harga' => '502',
        ]);
        DB::table('kamars')->insert([
            'nama_kamar' => 'Kamar ga asik',
            'kelas' => 'III',
            'Harga' => '302'
        ]);
        DB::table('kamars')->insert([
            'nama_kamar' => 'Kamar ml',
            'kelas' => 'II',
            'Harga' => '352'
        ]);
        DB::table('kamars')->insert([
            'nama_kamar' => 'Kamar pubg',
            'kelas' => 'I',
            'Harga' => '502',
        ]);
        DB::table('kamars')->insert([
            'nama_kamar' => 'Kamar epep',
            'kelas' => 'II',
            'Harga' => '352'
        ]);
        DB::table('kamars')->insert([
            'nama_kamar' => 'Kamar ga keren',
            'kelas' => 'III',
            'Harga' => '302'
        ]);


    }
}

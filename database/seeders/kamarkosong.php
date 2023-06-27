<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kamarkosong extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kamars')->insert([
            'nama_kamar' => 'Kamar selesai',
            'kelas' => 'Selesai',
            'Harga' => '0'
        ]);
    }
}

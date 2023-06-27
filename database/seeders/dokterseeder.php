<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class dokterseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dokters')->insert([
            'nik' => '12220563',
            'nama_dokter' => 'Robert Cross',
            'user_id' => 2,
            'spesialis' => 'umum',
            'jadwal' => 'Senin s/d Jumat, 08:00',
        ]);
    }
}

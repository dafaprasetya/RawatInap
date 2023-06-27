<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class testing extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kamars')->insert([
            'nama_kamar' => 'Kamar Selesai',
            'kelas' => 'II',
            'Harga' => '35.000'
        ]);
        DB::table('dokters')->insert([
            'nik' => '12220563',
            'nama_dokter' => 'Robert Cross',
            'spesialis' => 'umum',
            'jadwal' => 'Senin s/d Jumat, 08:00',
        ]);
        DB::table('pasiens')->insert([
            'nik' => '327101300305004',
            'nama_pasien' => 'Ujang shelby',
            'no_hp' => '081574999858',
            'alamat' => 'Jl. wakanda nomor 11 bogor',
            'tgl_lahir' => Carbon::create('2005', '02', '21'),
            'jenis_kelamin' => 'laki-laki',
            'kamar_id' => '1',
            'tgl_masuk' => Carbon::create('2020', '01', '11'),
            'gol_darah' => 'O',
            'pekerjaan' => 'begal',
            'warga_negara' => 'WNI',
            'status' => 'belum menikah',
            'nama_kk' => 'fred shelby',
            'pekerjaan_kk' => 'ketua begal',
            'nama_penanggung_jwb' => 'fred shelby',
            'nomor_penanggung_jwb' => '08123123123',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class pasiensider extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pasiens')->insert([
            'nik' => '12345678901234567',
                'nama_pasien' => 'John Doe',
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Contoh Alamat 123',
                'tgl_lahir' => '1990-01-01',
                'jenis_kelamin' => 'laki-laki',
                'kamar_id' => 1,
                'tgl_masuk' => '2023-06-15',
                'gol_darah' => 'A',
                'pekerjaan' => 'Pegawai',
                'warga_negara' => 'WNI',
                'status' => 'menikah',
                'nama_kk' => 'Jane Doe',
                'pekerjaan_kk' => 'Ibu Rumah Tangga',
                'nama_penanggung_jwb' => 'John Doe',
                'nomor_penanggung_jwb' => '081234567891',
                'keluar' => 'no',
        ]);
        DB::table('pasiens')->insert([
            'nik' => '98765432109876543',
                'nama_pasien' => 'Jane Smith',
                'no_hp' => '087654321098',
                'alamat' => 'Jl. Contoh Alamat 456',
                'tgl_lahir' => '1995-05-10',
                'jenis_kelamin' => 'perempuan',
                'kamar_id' => 2,
                'tgl_masuk' => '2023-06-10',
                'gol_darah' => 'AB',
                'pekerjaan' => 'Dokter',
                'warga_negara' => 'WNI',
                'status' => 'belum menikah',
                'nama_kk' => 'John Smith',
                'pekerjaan_kk' => 'Dosen',
                'nama_penanggung_jwb' => 'Jane Smith',
                'nomor_penanggung_jwb' => '087654321099',
                'keluar' => 'no',
        ]);
        DB::table('pasiens')->insert([
            'nik' => '12345678901234567',
                'nama_pasien' => 'John',
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Contoh Alamat 123',
                'tgl_lahir' => '1990-01-01',
                'jenis_kelamin' => 'laki-laki',
                'kamar_id' => 3,
                'tgl_masuk' => '2023-06-15',
                'gol_darah' => 'A',
                'pekerjaan' => 'Pegawai',
                'warga_negara' => 'WNI',
                'status' => 'menikah',
                'nama_kk' => 'Jane Doe',
                'pekerjaan_kk' => 'Ibu Rumah Tangga',
                'nama_penanggung_jwb' => 'John Doe',
                'nomor_penanggung_jwb' => '081234567891',
                'keluar' => 'no',
        ]);
    }
}


// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use App\Models\Kamar;

// class pasiensider extends Seeder
// {
//     public function run()
//     {
//         $data = [
//             [
//
//             ],
//             [
//                 '
//             ],
//             // Tambahkan data Kamar lainnya sesuai kebutuhan
//         ];

//         // Looping data dan buat instance model Kamar baru
//         foreach ($data as $item) {
//             $kamar = new Kamar;
//             $kamar->fill($item);
//             $kamar->save();
//         }
//     }
// }

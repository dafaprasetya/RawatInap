<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class testvisit extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('visit_dokters')->insert([
            'pasien_id' => '1',
            'dokter_id' => '1',
            'hari' => '2',
            'keluhan' => 'muntaber',
            'penyakit' => 'muntaber',
            'obat' => 'asam sulfat 2l',
        ]);
    }
}

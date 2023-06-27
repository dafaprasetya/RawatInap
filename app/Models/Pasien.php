<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    function visitdokter() {
        return $this->hasMany(VisitDokter::class);
    }
    function kamar() {
        return $this->belongsTo(Kamar::class);
    }
    public function perkembangan_pasien()
    {
        return $this->hasMany(PerkembanganPasien::class);
    }
    protected $fillable = [
        'nik',
        'nama_pasien',
        'no_hp',
        'alamat',
        'tgl_lahir',
        'jenis_kelamin',
        'kamar_id',
        'tgl_masuk',
        'gol_darah',
        'pekerjaan',
        'warga_negara',
        'status',
        'nama_kk',
        'pekerjaan_kk',
        'nama_penanggung_jwb',
        'nomor_penanggung_jwb',
        'keluar',
    ];
    use HasFactory;
}

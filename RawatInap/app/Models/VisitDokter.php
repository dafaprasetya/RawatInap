<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitDokter extends Model
{
    public function dokter() {
        return $this->belongsTo(Dokter::class);
    }
    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }
    function perkembangan_pasien() {
        return $this->belongsTo(PerkembanganPasien::class);
    }
    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'hari',
        'keluhan',
        'perkembangan',
        'penyakit',
        'obat',
        'rujuk',
        'perkembangan_pasien_id',
        'selesai',
    ];
    use HasFactory;
}

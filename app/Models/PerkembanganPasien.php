<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerkembanganPasien extends Model
{
    function visit() {
        return $this->hasMany(VisitDokter::class);
    }
    public function dokter() {
        return $this->hasMany(Dokter::class);
    }
    public function pasien() {
        return $this->belongsTo(Pasien::class);
    }
    public function invoice() {
        return $this->belongsTo(Invoice::class);
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
        'selesai',
    ];
    use HasFactory;
}

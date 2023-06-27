<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerkembanganPasien extends Model
{
    function visit() {
        return $this->hasMany(VisitDokter::class);
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

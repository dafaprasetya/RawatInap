<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'kamar_id',
        'nama_pasien',
        'harga_kamar',
        'hari',
        'total_checkup_perhari',
        'obat',
        'total_obat_perhari',
        'total',
    ];
    function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
    function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
    use HasFactory;
}

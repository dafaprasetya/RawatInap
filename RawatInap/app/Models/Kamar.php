<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    public function pasien() {
        return $this->hasOne(Pasien::class);
    }
    use HasFactory;
}

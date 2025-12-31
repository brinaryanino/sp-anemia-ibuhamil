<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BasisPengetahuan;
use App\Models\SaranAwal;

class Kondisi extends Model
{
    protected $fillable = ['kode_kondisi', 'nama_kondisi', 'deskripsi'];

    public function basisPengetahuans()
    {
        return $this->hasMany(BasisPengetahuan::class);
    }

    public function saranAwals()
    {
        return $this->hasMany(SaranAwal::class);
    }
}

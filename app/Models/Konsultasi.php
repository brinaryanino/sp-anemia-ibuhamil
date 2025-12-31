<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kondisi;
use App\Models\Gejala;

class Konsultasi extends Model
{
    protected $fillable = [
        'usia_kehamilan',
        'trimester',
        'hasil_kondisi_id',
        'nilai_cf'
    ];

    public function kondisi()
    {
        return $this->belongsTo(Kondisi::class, 'hasil_kondisi_id');
    }

    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'konsultasi_gejala');
    }
}

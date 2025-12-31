<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gejala;
use App\Models\Kondisi;

class BasisPengetahuan extends Model
{
    protected $fillable = ['gejala_id', 'kondisi_id', 'cf_pakar'];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }

    public function kondisi()
    {
        return $this->belongsTo(Kondisi::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KonsultasiGejala extends Model
{
    public $timestamps = false;

    protected $fillable = ['konsultasi_id', 'gejala_id'];
}

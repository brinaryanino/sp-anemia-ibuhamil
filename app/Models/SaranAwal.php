<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kondisi;

class SaranAwal extends Model
{
    protected $fillable = ['kondisi_id', 'trimester', 'fokus', 'deskripsi_saran'];

    public function kondisi()
    {
        return $this->belongsTo(Kondisi::class);
    }
}

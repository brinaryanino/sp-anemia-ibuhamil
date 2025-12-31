<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Gejala;
use App\Models\Kondisi;

class Rule extends Model
{
    protected $fillable = ['kode_rule', 'kondisi_id', 'metode'];

    public function gejalas()
    {
        return $this->belongsToMany(Gejala::class, 'rule_details');
    }

    public function kondisi()
    {
        return $this->belongsTo(Kondisi::class);
    }
}

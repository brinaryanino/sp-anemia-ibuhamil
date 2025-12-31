<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\BasisPengetahuan;
use App\Models\Rule;

class Gejala extends Model
{
    protected $fillable = ['kode_gejala', 'nama_gejala', 'deskripsi'];

    public function basisPengetahuans()
    {
        return $this->hasMany(BasisPengetahuan::class);
    }

    public function rules()
    {
        return $this->belongsToMany(Rule::class, 'rule_details');
    }
}

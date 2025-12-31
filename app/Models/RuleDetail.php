<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuleDetail extends Model
{
    public $timestamps = false;

    protected $fillable = ['rule_id', 'gejala_id'];
}

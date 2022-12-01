<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referees extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',
    'name',
    'occupation',
    'address',
    'code',
    'town',
    'mobile',
    'email',
    'period'
];
protected $casts = [
    'name' => 'array',
    'occupation' => 'array',
    'address' => 'array',
    'code' => 'array',
    'town' => 'array',
    'mobile' => 'array',
    'email' => 'array',
    'period' => 'array'
];
}

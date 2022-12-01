<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessionalBodies extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',
    'body',
    'regNo',
    'type',
    'renewal'
];
protected $casts = [
    'body' => 'array',
    'regNo' => 'array',
    'type' => 'array',
    'renewal' => 'array'
];
}

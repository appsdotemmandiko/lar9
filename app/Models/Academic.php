<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',
    'instName',
    'startDate',
    'endDate',
    'course',
    'major',
    'grade',
    'level',
    'graduated'
];
protected $casts = [
    'instName' => 'array',
    'startDate' => 'array',
    'endDate' => 'array',
    'course' => 'array',
    'major' => 'array',
    'grade' => 'array',
    'level' => 'array',
    'graduated' => 'array'
];
}

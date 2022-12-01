<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',
    'instName',
    'startDate',
    'endDate',
    'course',
    'award',
    'major',
    'grade'
];
protected $casts = [
    'instName' => 'array',
    'startDate' => 'array',
    'endDate' => 'array',
    'course' => 'array',
    'award' => 'array',
    'major' => 'array',
    'grade' => 'array'
];
}

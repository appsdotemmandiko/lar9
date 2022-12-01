<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',
    'orgName',
    'designation',
    'startDate',
    'currJob',
    'endDate',
    'grade',
    'terms'
];
protected $casts = [
    'orgName' => 'array',
    'designation' => 'array',
    'startDate' => 'array',
    'currJob' => 'array',
    'endDate' => 'array',
    'grade' => 'array',
    'terms' => 'array'
];

}

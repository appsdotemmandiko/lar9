<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApp extends Model
{
    use HasFactory;
    protected $fillable = [
    'job_id',
    'user_id',
    'cv',
    'cover',
    'licence'
];
}

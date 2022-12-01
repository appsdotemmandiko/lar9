<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',
    'title',
    'dob',
    'passportId',
    'gender',
    'postalAdd',
    'postalCode',
    'town',
    'telephone',
    'telephoneAlt',
    'disability',
    'disabilityNature',
    'ncpwd',
    'civilStatus',
    'crimeOffence',
    'crimeNature',
    'crimeYear',
    'crimeDuration',
    'empDismissal',
    'empDismissalReason',
    'profileSession'
];
}

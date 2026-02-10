<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'contact_number',
        'services',
        'operating_hours',
    ];
}

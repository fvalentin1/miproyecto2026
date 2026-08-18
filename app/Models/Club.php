<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $fillable = [
        'name',
        'titles',
        'city',
        'country',
        'colors',
        'stadium',
        'founded_year',
    ];
}

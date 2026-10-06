<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Confederation extends Model
{
    protected $fillable = [
        'name',
        'acronym',
        'continent',
        'logo',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EyeColourPreferences extends Model
{
    protected $primaryKey = ['userId', 'eyeColourId'];

    protected $fillable = [
        'userId', 'eyeColourId', 'weightVector'
    ];
}

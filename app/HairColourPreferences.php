<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HairColourPreferences extends Model
{
    protected $primaryKey = ['userId', 'hairColourId'];

    protected $fillable = [
        'userId', 'hairColourId', 'weightVector'
    ];
}

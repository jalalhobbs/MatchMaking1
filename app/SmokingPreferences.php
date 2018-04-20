<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmokingPreferences extends Model
{
    protected $primaryKey = ['userId', 'smokingId'];

    protected $fillable = [
        'userId', 'smokingId', 'weightVector'
    ];
}

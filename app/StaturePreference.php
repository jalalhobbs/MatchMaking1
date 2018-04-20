<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaturePreference extends Model
{
    protected $primaryKey = ['userId', 'statureId'];

    protected $fillable = [
        'userId', 'statureId', 'weightVector'
    ];
}

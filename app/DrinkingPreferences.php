<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrinkingPreferences extends Model
{
    protected $primaryKey = ['userId', 'drinkingId'];

    protected $fillable = [
        'userId', 'drinkingId', 'weightVector'
    ];
}

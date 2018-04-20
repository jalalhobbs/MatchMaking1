<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalityTypePreferences extends Model
{
    protected $primaryKey = ['userId', 'personalityTypeId'];

    protected $fillable = [
        'userId', 'personalityTypeId', 'weightVector'
    ];
}

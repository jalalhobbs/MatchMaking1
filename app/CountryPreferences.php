<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryPreferences extends Model
{
    protected $primaryKey = ['userId', 'countryId'];

    protected $fillable = [
        'userId', 'countryId', 'weightVector'
    ];
}

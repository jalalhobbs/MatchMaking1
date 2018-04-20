<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenderPreferences extends Model
{
    protected $primaryKey = ['userId', 'genderId'];

    protected $fillable = [
        'userId', 'genderId', 'weightVector'
    ];
}

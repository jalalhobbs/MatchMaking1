<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReligionPreferences extends Model
{
    protected $primaryKey = ['userId', 'ReligionId'];

    protected $fillable = [
        'userId', 'ReligionId', 'weightVector'
    ];
}

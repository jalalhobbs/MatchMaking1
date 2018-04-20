<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeisurePreferences extends Model
{
    protected $primaryKey = ['userId', 'leisureId'];

    protected $fillable = [
        'userId', 'leisureId', 'weightVector'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EthnicityPreferences extends Model
{
    protected $primaryKey = ['userId', 'ethnicityId'];

    protected $fillable = [
        'userId', 'ethnicityId', 'weightVector'
    ];
}

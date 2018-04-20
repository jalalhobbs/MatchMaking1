<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodyTypePreferences extends Model
{
    protected $primaryKey = ['userId', 'bodyTypeId'];

    protected $fillable = [
        'userId', 'bodyTypeId', 'weightVector'
    ];


}

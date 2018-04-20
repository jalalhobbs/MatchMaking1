<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalityType extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'personalityTypeName',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smoking extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'drinkingPrefName',
    ];
}

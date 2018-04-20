<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stature extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'statureName',
    ];
}

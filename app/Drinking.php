<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drinking extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'smokingPrefName',
    ];
}

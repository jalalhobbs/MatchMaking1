<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'religionName',
    ];
}

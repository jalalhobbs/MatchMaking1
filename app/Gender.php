<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'genderName',
    ];
}

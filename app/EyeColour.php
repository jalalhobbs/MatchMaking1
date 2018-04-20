<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EyeColour extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'eyeColourName',
    ];
}

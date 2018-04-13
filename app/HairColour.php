<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HairColour extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'hairColourName',
    ];
}

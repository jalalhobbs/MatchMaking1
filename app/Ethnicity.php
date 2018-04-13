<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ethnicity extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'ethnicityName',
    ];
}

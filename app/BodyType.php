<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'bodyTypeName',
    ];
}

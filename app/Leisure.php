<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leisure extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'leisureName',
    ];
}

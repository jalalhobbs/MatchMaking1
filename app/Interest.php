<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'interestName',
    ];
}

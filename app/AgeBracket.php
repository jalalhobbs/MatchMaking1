<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeBracket extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'ageBracketName',
    ];
}

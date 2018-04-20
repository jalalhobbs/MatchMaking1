<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeBracketPreference extends Model
{
    protected $primaryKey = ['userId', 'ageBracketId'];

    protected $fillable = [
        'userId', 'ageBracketId', 'weightVector'
    ];
}

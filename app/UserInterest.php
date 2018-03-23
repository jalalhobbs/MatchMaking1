<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInterest extends Model
{
    protected $primaryKey = (['userId','interestId']);

    protected $fillable = [
        'userId', 'interestId', 'answer', 'answerWeight'
    ];

    public function userId()
    {
        return $this->hasOne('App\User', 'id');
    }

    public function interestId()
    {
        return $this->hasOne('App\Interest', 'id');
    }
}

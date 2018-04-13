<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $primaryKey = (['userId','matchId']);

    protected $fillable = [
        'userId', 'targetId',
    ];

    public function userId()
    {
        return $this->hasOne('App\User', 'id');
    }

    public function matchId()
    {
        return $this->hasOne('App\User', 'id');
    }


}

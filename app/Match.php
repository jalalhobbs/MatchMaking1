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
        return $this->belongsTo('App\User', 'userId');
    }

    public function matchId()
    {
        return $this->hasOne('App\User', 'targetId');
    }


}

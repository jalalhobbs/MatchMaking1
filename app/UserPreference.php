<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPreference extends Model
{
    //protected $primaryKey = (['userId','preferenceId']);

    protected $fillable = [
        'userId', 'preferenceId', 'answer', 'answerWeight'
    ];

    public function userId()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function preferenceId()
    {
        return $this->hasOne('App\Preference', 'id');
    }

    public function userTarget()
    {
        return $this->hasOne('App\UserTarget', 'id');
    }





}

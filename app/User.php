<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    public function gender()
    {
        return $this->hasOne('App\Gender', 'id');
    }

    public function religion()
    {
        return $this->hasOne('App\Religion', 'id');
    }

    public function bodyType()
    {
        return $this->hasOne('App\BodyType', 'id');
    }

    public function targetGender()
    {
        return $this->hasOne('App\Gender', 'id');
    }

    public function targetReligion()
    {
        return $this->hasOne('App\Religion', 'id');
    }

    public function targetBodyType()
    {
        return $this->hasOne('App\BodyType', 'id');
    }

    public function userInterests()
    {
        return $this->hasMany('App\UserInterest', (['userId','interestId']));
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password', 'facebookProfileLink'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    function socialProviders()
    {
        return $this->hasMany(SocialProvider::class);
    }

}

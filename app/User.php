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

    public function userTarget()
    {
        return $this->hasOne('App\UserTarget', 'id');
    }

    public function userPreferences()
    {
        return $this->hasMany('App\UserPreference', (['userId','interestId']));
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



    public function age() {
        return $this->dob->diffInYears(\Carbon::now());
    }

}

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

    public function stature()
    {
        return $this->hasOne('App\Stature', 'id');
    }

    public function religion()
    {
        return $this->hasOne('App\Religion', 'id');
    }

    public function bodyType()
    {
        return $this->hasOne('App\BodyType', 'id');
    }

    public function country()
    {
        return $this->hasOne('App\Country', 'id');
    }

    public function ethnicity()
    {
        return $this->hasOne('App\Ethnicity', 'id');
    }

    public function hairColour()
    {
        return $this->hasOne('App\HairColour', 'id');
    }

    public function eyeColour()
    {
        return $this->hasOne('App\EyeColour', 'id');
    }

    public function education()
    {
        return $this->hasOne('App\Education', 'id');
    }

    public function drinking()
    {
        return $this->hasOne('App\Drinking', 'id');
    }

    public function smoking()
    {
        return $this->hasOne('App\Smoking', 'id');
    }

    public function leisure()
    {
        return $this->hasOne('App\Leisure', 'id');
    }

    public function personalityType()
    {
        return $this->hasOne('App\PersonalityType', 'id');
    }


    //Targets

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

    public function targetCountry()
    {
        return $this->hasOne('App\Country', 'id');
    }

    public function targetEthnicity()
    {
        return $this->hasOne('App\Ethnicity', 'id');
    }

    public function targetHairColour()
    {
        return $this->hasOne('App\HairColour', 'id');
    }

    public function targetEyeColour()
    {
        return $this->hasOne('App\EyeColour', 'id');
    }

    public function targetEducation()
    {
        return $this->hasOne('App\Education', 'id');
    }

    public function targetDrinking()
    {
        return $this->hasOne('App\Drinking', 'id');
    }

    public function targetSmoking()
    {
        return $this->hasOne('App\Smoking', 'id');
    }

    public function targetLeisure()
    {
        return $this->hasOne('App\Leisure', 'id');
    }

    public function targetPersonalityType()
    {
        return $this->hasOne('App\PersonalityType', 'id');
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName', 'email', 'password', 'facebookProfileLink', 'profilePicture', 'genderId', 'targetGenderId'
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


    public function age()
    {
        return $this->dob->diffInYears(\Carbon::now());
    }

    public function matches()
    {
        return $this->hasMany('App\Match', 'targetId');
    }

    public function targetLike()
    {
        return $this->hasMany('App\User');
    }

    public function getEmailAttribute($email) {
        return strtolower($email);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTarget extends Model
{
    protected $primaryKey = 'id';


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
}

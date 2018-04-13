<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTarget extends Model
{


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
}

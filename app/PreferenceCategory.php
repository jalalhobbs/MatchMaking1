<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreferenceCategory extends Model
{
    public function Preference()
    {
        return $this->hasMany('App\Preference', 'id');
    }
}

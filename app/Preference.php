<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'preferenceName',
    ];

    public function preferenceCategory()
    {
        return $this->hasOne('App\PreferenceCategory', 'id');
    }

    public function preferenceType()
    {
        return $this->hasOne('App\PreferenceType', 'id');
    }
}

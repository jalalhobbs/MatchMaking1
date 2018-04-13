<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{
    protected $primaryKey = (['userId','suggestId']);

    protected $fillable = [
        'userId', 'suggestId',
    ];

    public function userId()
    {
        return $this->hasOne('App\User', 'id');
    }

    public function suggestId()
    {
        return $this->hasOne('App\User', 'id');
    }
}

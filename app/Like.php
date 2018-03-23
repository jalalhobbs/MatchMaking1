<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $primaryKey = (['userId','targetId']);

    protected $fillable = [
        'userId', 'targetId', 'expiry',
    ];

    public function userId()
    {
        return $this->hasOne('App\User', 'id');
    }

    public function targetId()
    {
        return $this->hasOne('App\User', 'id');
    }
}

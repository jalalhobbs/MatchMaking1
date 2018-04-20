<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationPreferences extends Model
{
    protected $primaryKey = ['userId', 'educationId'];

    protected $fillable = [
        'userId', 'educationId', 'weightVector'
    ];
}

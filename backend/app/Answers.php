<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $fillable = [
        'email', 'surveyId','token','done','answer'
    ];

    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $fillable = [
        'email', 'surveyId', 'answer'
    ];

    public $timestamps = false;
}

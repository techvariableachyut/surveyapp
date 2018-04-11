<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = [
        'token','title','json'
    ];

    protected $primaryKey = "token";
}

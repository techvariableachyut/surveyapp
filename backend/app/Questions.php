<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $fillable = [
        'section', 'type', 'name', 'title', 'ifForEach'
    ];
}
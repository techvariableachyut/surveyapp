<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    protected $fillable = [
        'name', 'status'
    ];

    protected $primary = "name";
}

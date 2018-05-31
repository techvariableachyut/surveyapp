<?php

namespace App\Http\Controllers;

use App\Sections;
use App\Questions;
use App\Http\Controllers\Controller;

class Questions extends Controller
{
    public function (){
    	$questions = Questions::all();

    	dd($questions);
    	return response()->json(['questions' => $questions]);
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use App\Answers;
use App\Mail\SaveAndContinue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LazyController extends Controller
{
    
    public function emailandstore(Request $request){
        $uuid = uniqid();
        $id = $request['surveyId'];
        $answers = json_encode($request['answers']);
        $email = $request['email'];

        $user = Answers::create([
                'surveyId' => $id,
                'uniqueid' => $uuid,
                'answer' => $answers,
                'email' => $email,
                'done' => 0
        ]);

        Mail::to($user)->send(new SaveAndContinue($user));
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use App\Answers;
use App\Mail\SaveAndContinue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LazyController extends Controller
{
    public function emailandstore(){
        $uid = uniqid();
        $id = $request['id'];
        $answers = $request['answers'];
        $email = $request['email'];

        $user = Answers::create([
                'surveyId' => $id,
                'token' => $uuid,
                'answer' => $answers,
                'email' => $email
                'done' => false
        ]);

        Mail::to($user)->send(new SaveAndContinue($user));
    }
}

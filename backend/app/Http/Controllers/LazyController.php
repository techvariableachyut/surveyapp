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
        $email = $request['email'];

        $check = Answers::where('email',$email)->where('surveyId',$id)->where('done',false)->first();

        if ($check == null) {
            $user = Answers::create([
                    'surveyId' => $id,
                    'token' => $uuid,
                    'answer' => json_encode($request['answer']),
                    'email' => $email,
                    'done' => 'Incomplete'
            ]);

            $this->mailpotha($user);   
        }else{
            $user = Answers::where('email',$email)->where('surveyId',$id)->where('done',false)
                        ->update(['answer' => json_encode($request['answer']) ]);

            $this->mailpotha($check);
        }

    }

    private function mailpotha($modeltuAse){
        Mail::to($modeltuAse)->send(new SaveAndContinue($modeltuAse));
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use App\Answers;
use App\Mail\SaveAndContinue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LazyController extends Controller
{
    public function emailandstore($id, $answers){

        $answer = Answers::where('surveyId', $id)->first();
        if ($answer) {
            Answers::where('surveyId',$id)->update([
                'answer' => $answers
            ]);
        }else{
            $answer = Answers::create([
                'surveyId' => $id,
                'answer' => $answers
            ]);
        }

        $user = Answers::findOrFail(1);
        Mail::to($user)->send(new SaveAndContinue($answer));
    }
}

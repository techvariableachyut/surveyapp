<?php

namespace App\Http\Controllers;

use Auth;
use App\Answers;
use App\Questions;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function copy($id){
        $old = Questions::where('token', $id)->first();

        $new = Questions::create([
            'token' => uniqid(),
            'title' => $old->title,
            'json' => $old->json,
        ]);

        return response()->json(['new' => $new ]);
    }
}

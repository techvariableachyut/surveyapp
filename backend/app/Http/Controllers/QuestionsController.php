<?php

namespace App\Http\Controllers;

use App\Sections;
use App\Questions;
use App\Dropdownvalues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $newquestion = array();

        $q = Questions::find("page1");
        $questions = json_decode($q->json);

        foreach ($questions->pages as $index => $question) {
            // foreach ($question[0] as  $value) {
                $newquestion[] = $question;
            // }   
                  
        }

        return response()->json(['response' => $newquestion, 'all' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $json = json_decode($request->input('Json'));

        if (!$json->title) {
            return response()->json(['error' => "Title not set."]);
        }
        $token = base64_encode($json->title);

        $question = Questions::find($token);
        if ($question == null) {
            // dd($json);
            $newjson = Questions::create([
                'token' => $token,
                'json' => $request->input('Json')
            ]);
        }else{
            $newjson = Questions::where('token',$token)->update([
                'json' => $request->input('Json')
            ]);
        }

        return response()->json(['json' => $newjson ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

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
        $param = uniqid();
        return redirect()->route('create.questions', ['surveyId' => $param]);
    }

    public function make()
    {
        return view('editor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $token = $_GET['surveyId'];
        $json = json_decode($request->input('Json'));

        if (!$json->pages) {
            return response()->json(['error' => "No data found."]);
        }

        $question = Questions::find($token);
        if ($question == null) {
            $newjson = Questions::create([
                'token' => $token,
                'title' => $json->title,
                'json' =>  json_encode($json->pages)
            ]);
        }else{
            $newjson = Questions::where('token',$token)->update([
                'title' => $json->title,
                'json' => json_encode($json->pages)
            ]);
        }
        return response()->json(['json' => $json->pages ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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

    public function getSurvey(Request $request){
        $token = $_GET['surveyId'];
        $questions = Questions::where('token',$token)->first();

        if ($questions == null) {
            $newjson = NUll;
        }else{
            $newjson = json_decode($questions->json);
        }

        return response()->json(['pages' => $newjson]);
        // return response()->json($_GET['start']);
        
    }


    public function vieweditpage(){
        return view('questions.view');
    }
}

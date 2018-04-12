<?php

namespace App\Http\Controllers;

use Auth;
use App\Sections;
use App\Questions;
use App\Dropdownvalues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        if (!Auth::user()) {
            return redirect('/login');
        }
        $questions = Questions::all();
        //dd($questions);
        return view('survey.lists',compact('questions'));
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

    public function survey(){
        return view('survey.index');
    }

    public function home(Request $request){
        $questions = Questions::all();
        //dd($questions);
        if ($request->ajax()) {
            return response()->json(['questions' => json_decode($questions)]);
        }else{
            return view('survey.home',compact('questions'));   
        }
    }

    public function questions($id){
        $array = array();

        $q = Questions::where('token',$id)->first();
        $question = json_decode($q->json);

        foreach ($question[0]->elements as $key => $value) {
            $array[] = $value;
        }
        return response()->json(['question' => $array]);
    }
}

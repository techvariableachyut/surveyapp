<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answers;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $uniqueid = uniqid();
        $id = $request['surveyId'];

        $uniqueid = uniqid();
        $answer = Answers::create([
            'surveyId' => $id,
            'token' => $uniqueid,
            'done' => "Completed",
            'answer' => json_encode($request['answer'])
        ]);
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
    public function update(Request $request)
    {
        $surveyId = $request['surveyId'];
        $tokenId = $request['tokenId'];
        Answers::where([             
                'surveyId' => $surveyId,
                'token' => $tokenId
        ])->update(['answer' => json_encode($request['answer']), 'done' => 'Reviewed' ]);
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

    public function resumecompleteupdate(Request $request){
        $surveyId = $request['surveyId'];
        $tokenId = $request['tokenId'];
        Answers::where([             
                'surveyId' => $surveyId,
                'token' => $tokenId
        ])->update(['answer' => json_encode($request['answer']), 'done' => "Completed" ]);
    }

    public function storeMany(Request $request){
        $uniqueid = uniqid();
        $array = $request['data'];
        foreach ($array as $key => $value) {
            Answers::create([
                'surveyId' => $value->surveyId,
                'token' => $uniqueid,
                'answer' => json_encode(array("currentPageNo" => $value->currentPageNo, "data" => $value->data)),
                'done' => "Completed" 
            ]);
        }
    
    }
}

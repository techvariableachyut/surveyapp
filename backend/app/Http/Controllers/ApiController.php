<?php

namespace App\Http\Controllers;

use App\Sections;
use App\Questions;
use App\Dropdownvalues;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = array();
        $sections = Sections::all();
        $drop = Dropdownvalues::all();

        $questions = DB::table('questions')
            ->join('sections', 'sections.id', '=', 'questions.section')
            ->join('dropdownvalues', 'questions.id', '=', 'dropdownvalues.nameid')
            ->select('sections.id','sections.name as topname','questions.id as qid' ,'questions.type','questions.name','questions.title as question','questions.ifForEach','questions.section as sectionid', 'dropdownvalues.name as dropname')
            ->get();

        foreach ($sections as $section) {
            $group = array();
            $group["title"] = $section->name; 
            foreach ($questions as $question) {
                if($section->id == $question->sectionid){
                    $group[$question->name] = ['type' => $question->type,'question'=> $question->question, 'choices' => $drop->whereIn('nameid',[$question->qid])->pluck('name')];
                }
            }   
            $array[] = $group; 
        }

        return response()->json(['questions' => $array]);
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
        //
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

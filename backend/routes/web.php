<?php

use App\Mail\SaveAndContinue;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('home');
});

// Route::resource('api', 'ApiController');

Auth::routes();
Route::get('/home', 'SurveyController@survey');


Route::get('/create/question', 'QuestionsController@create');
Route::get('/create/questions{surveyId?}', 'QuestionsController@make')->name('create.questions');


Route::post('/changeJson', 'QuestionsController@store')->name('questions');
Route::resource('questions', 'QuestionsController');
Route::resource('survey', 'SurveyController');

Route::get('/lazy/survey/answer', function () {
	$order = \App\Answers::findOrFail(1);
	$questions = \App\Questions::findOrFail("QmxhIGJsYSBibGE=");
	Mail::to($order)->send(new SaveAndContinue($questions));
});



Route::get('/getSurvey', 'QuestionsController@getSurvey');
Route::get('/survey/edit', 'QuestionsController@getSurvey');

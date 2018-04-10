<?php

Route::get('/', function () {
    return view('home');
});

// Route::resource('api', 'ApiController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/create/question', function () {
	if (Auth::guest()) {
		return view('auth.login');
	}
    return view('editor');
});
Route::post('/changeJson', 'QuestionsController@store')->name('questions');
Route::resource('questions', 'QuestionsController');
Route::resource('survey', 'SurveyController');
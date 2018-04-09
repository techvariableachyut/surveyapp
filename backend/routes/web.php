<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/survey/questions', 'Questions@questions')->name('questions');

Route::resource('sections', 'SectionsController');
Route::resource('questions', 'QuestionsController');
Route::resource('api', 'ApiController');

Route::get('/editor', function () {
    return view('editor');
});



Route::post('/changeJson', 'QuestionsController@store')->name('questions');

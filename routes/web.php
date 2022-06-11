<?php

Route::get('/', function () {
    return view('site');
});

Auth::routes();

Route::resource('hobbies', 'HobbyController');
Route::resource('categories', 'CategoryController');

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/question/store', 'QuestionController@store');
Route::post('/suggestion/store', 'SuggestionController@store');

Route::get('/search', 'HobbyController@search');
Route::post('/hobbies/upload', 'HobbyController@upload');

Route::get('/users/{user}', 'UserController@show');
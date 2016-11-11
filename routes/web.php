<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
	return view('principal');
});



Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/principal', 'principalController@index');
Route::get('/inicio', 'principalController@inicio'); //Vista principal
Route::get('/category','CategoryController@index'); //Categorias
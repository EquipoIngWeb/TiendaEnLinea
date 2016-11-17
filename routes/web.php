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

Route::get('/checkout',function () {
	return view('checkout');
});

Route::get('/','homeController@index');


Route::get('/see/{product_id}','productController@show');
Route::get('/category/{category_id}','categoryController@show');


Auth::routes();

Route::get('/principal', 'principalController@index');
Route::get('/inicio', 'principalController@inicio'); //Vista principal
Route::get('/category/{id}','ProductController@ofCategory'); //Categorias

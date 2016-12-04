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

Route::get('/','HomeController@index')->name('home');

Route::get('/category/{id}','CategoryController@show')->name('view_category');
Route::get('/gender/{id}','GenderController@show')->name('view_gender');
Route::get('/subcategory/{id}','SubcategoryController@show')->name('view_subcategory');

Route::get('/add_cart/{product_id}','ProductController@addToCart')->name('add_to_cart');

Route::get('/view/{product_id}','ProductController@show')->name('view_product');

Route::post('/store','Auth\RegisterController@store');
Auth::routes();

Route::get('/principal', 'PrincipalController@index');
Route::get('/inicio', 'PrincipalController@inicio'); //Vista principal
// Route::get('/category/{id}','ProductController@ofCategory'); //Categorias

Route::get('register/verify/{id}','Auth\RegisterController@confirm');

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


# Pagina principal.
Route::get('/','HomeController@index')->name('home');

/*Auth*/
	Auth::routes();
	# Activar cuenta.
	Route::get(
		'register/verify/{id}',
		'Auth\RegisterController@confirm'
	);
	# Registrar usuario
	Route::post('/store','Auth\RegisterController@store');

/* Consultar ropa */
	# Ver ropa de un genero en especifico.
	Route::get(
		'/gender/{id}',
		'GenderController@show'
	)->name('view_gender');
	# ver ropa de una categoria.
	Route::get(
		'/category/{id}',
		'CategoryController@show'
	)->name('view_category');
	# Ver ropa de una subcategoria.
	Route::get(
		'/subcategory/{id}',
		'SubcategoryController@show'
	)->name('view_subcategory');
	# Ver un producto en especifico.
	Route::get(
		'/view/{product_id}',
		'ProductController@show'
	)->name('view_product');
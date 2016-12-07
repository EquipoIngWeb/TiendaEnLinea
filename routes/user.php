<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/','UserController@show');
Route::get('/ticket/{sale_id}','UserController@ticket');

# Guardar un comentario.
Route::post(
	'/view/{product_id}',
	'ProductController@saveComment'
)->name('save_comment_product');
# Calificar producto.
Route::get(
	'/product/{product_id}/score/{score}',
	'ScoreController@score'
);

/* Carrito */
	# Agregar al carrito.
	Route::post(
		'/sale/addToCart',
		'SaleController@addToCart'
	);
	# Eliminar del carrito.
	Route::get(
		'/remove_cart/{product_id}',
		'SaleController@removeFromCart'
	);
	# Ver el carrito.
	Route::get(
		'/cart',
		'SaleController@viewCart'
	)->name('view_cart');
	# Realizar venta.
	Route::get(
		'/buy_the_cart/{confirmation_code}',
		'SaleController@buyAllFromCart'
	);
	Route::get(
		'/sendEmailForCart',
		'SaleController@sendEmail'
	);
	
/*
Route::post(
	'/sale',
	'SaleController@store'
);
*/
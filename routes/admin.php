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
Route::get('/','AdminController@index');
Route::get('users','AdminController@users');
Route::delete('users/{id}','UserController@destroy');
Route::get('categories/{category}/products','ProductController@ofCategories');
Route::get('categories/{category}/products/create','ProductController@create');
Route::get('categories/{category}/products/{id}','ProductController@edit');

Route::get('categories/add/{id_first}','CategoryController@add');
Route::get('categories/add/{id_first}','CategoryController@add');
Route::post('categories/{category}/products/csv','ProductController@csv');
Route::resource('categories','CategoryController');
Route::resource('brands','BrandController');
Route::resource('sizes','SizeController');
Route::resource('colors','ColorController');

Route::resource('products','ProductController');
Route::resource('sales','SaleController');

Route::post('images/setdefault','ImageController@seDefault');
Route::post('images/change','ImageController@changeName');
Route::post('images/upload','ImageController@upload');
Route::delete('images/delete','ImageController@delete');
Route::get('images/directories/', 'ImageController@directories');
Route::resource('images', 'ImageController');
Route::resource('inventories', 'InventoryController');

Route::get('comments/{id}/desaproved/','CommentController@desaproved');
Route::get('comments/{id}/aproved/','CommentController@aproved');
Route::resource('comments', 'CommentController');

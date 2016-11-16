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

Route::get('/','AdminController@homeadmin');
Route::resource('categories', 'CategoryController');
Route::resource('brands', 'BrandController');
Route::resource('sizes', 'SizeController');

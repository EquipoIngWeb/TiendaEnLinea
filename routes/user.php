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

Route::get('/', function (Request $request) {
    return $request->user();
});
Route::post('/view/{product_id}','ProductController@saveComment')->name('save_comment_product');
Route::post('/sale', 'SaleController@store');
Route::post('score', 'ScoreController@store');

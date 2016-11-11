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

<<<<<<< HEAD
Route::get('/homeadmin', 'administrador\AdminController@homeadmin');
=======
>>>>>>> 033c9fc8515b4703a49a5e92c3bfcd821b216e6a

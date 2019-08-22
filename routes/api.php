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


Route::post('/login', 'LoginController@login');

Route::get('/user', 'UserController@show')->middleware('auth');

Route::post('/authors', 'AuthorsController@store');
Route::get('/authors', 'AuthorsController@index');
Route::put('/authors/{author}', 'AuthorsController@update');
Route::delete('/authors/{author}', 'AuthorsController@delete');
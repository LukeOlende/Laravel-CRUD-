<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','App\Http\Controllers\WebUsersController@index');
Route::get('/add-user','App\Http\Controllers\WebUsersController@create');
Route::post('/add-user','App\Http\Controllers\WebUsersController@store');
Route::get('/edit-user/{user}','App\Http\Controllers\WebUsersController@edit');
Route::post('/edit-user/{user}','App\Http\Controllers\WebUsersController@update');
Route::delete('/delete-user/{user}','App\Http\Controllers\WebUsersController@delete');

Route::get('/add-user','App\Http\Controllers\WebUsersController@create'); 
Route::post('get-states-by-country','App\Http\Controllers\WebUsersController@getState');
Route::post('get-cities-by-state','App\Http\Controllers\WebUsersController@getCity');

Route::get('/home', function () {
    return view('home');
});

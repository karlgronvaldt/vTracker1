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

Route::view('/', 'map');

Route::get('locdata', 'LocDataController@locdata');

Route::get('test', 'LocDataController@test');

Route::get('data', 'LocDataController@index');
Route::post('data', 'LocDataController@store');
Route::get('data/{id}', 'LocDataController@show');
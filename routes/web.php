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

Route::get('/', 'DogsController@index')->name('dogs.index');
Route::get('/all', 'DogsController@all')->name('dogs.all');
Route::get('/dogs/{dog}', 'DogsController@show')->name('dogs.show');
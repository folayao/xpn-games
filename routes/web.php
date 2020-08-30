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

Route::get('/', 'HomeController@index' );

/* VideoGame Routes  */

Route::get('/videogames', 'VideoGameController@show')->name('videogame.show');
Route::post('/videogames/create', 'VideoGameController@create')->name('videogame.store');
Route::delete('/videogames/destroy', 'VideoGameController@delete')->name('videogame.destroy');


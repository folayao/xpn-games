<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/videogames', 'Api\VideoGameApi@index')->name("api.videogame.index");
Route::get('/videogames/{id}', 'Api\VideoGameApi@show')->name("api.videogame.show");


Route::get('/presave', 'Api\VideoGameApi@presave')->name("api.videogame.save");
Route::post('/videogame/save', 'Api\VideoGameApi@save')->name("api.videogame.save");
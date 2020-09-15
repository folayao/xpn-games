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
Route::get('/home', 'HomeController@index')->name('home.index');
/* VideoGame Routes  */
Route::get('/videogames/show/{id}', 'VideoGameController@show')->name('videogame.show');
Route::get('/videogames/create', 'VideoGameController@create')->name('videogame.create');
Route::get('/videogames/delete/{id}','VideoGameController@delete')->name("videogame.delete");
Route::get('/', 'VideoGameController@list')->name('videogame.list');
Route::post('/videogames/save', 'VideoGameController@save')->name('videogame.save');
Route::post('/comment/save', 'CommentController@save')->name("comment.save");
Route::post('/wishList/save', 'WishListController@store')->name("wishList.store");
Route::get('/wishList/show', 'WishListController@show')->name("user.wishList");
Route::get('/role/destroy/{id}', 'RolesController@destroy')->name("role.destroy");
Route::resource('posts', 'PostsController');
Route::resource('users', 'UserController');
Route::resource('roles', 'RolesController');


Auth::routes();

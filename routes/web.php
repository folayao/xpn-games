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
Route::get('/', 'HomeController@index')->name('home');
Route::get('lang/{locale}', 'HomeController@lang');

/* VideoGame Routes  */
Route::get('/videogames/show/{id}', 'VideoGameController@show')->name('videogame.show');
Route::get('/videogames/create', 'VideoGameController@create')->name('videogame.create');
Route::get('/videogames/delete/{id}','VideoGameController@delete')->name("videogame.delete");
Route::get('/videogames', 'VideoGameController@list')->name('videogame.list');
Route::post('/videogames/save', 'VideoGameController@save')->name('videogame.save');
Route::post('/videogames/add-to-cart/{id}', 'ItemController@addToCart')->name("item.addToCart");
Route::post('/','AlgoliaController@search')->name('videogame.algolia');
/* Cart Routes  */
Route::get('/cart/remove', 'ItemController@removeCart')->name("item.removeCart");
Route::get('/cart/cart', 'ItemController@cart')->name("item.cart");
Route::post('/cart/buy', 'OrderController@buy')->name("order.buy");

Route::post('/comment/save', 'CommentController@save')->name("comment.save");
/*Wishlist Routes */
Route::post('/wishList/save', 'WishListController@store')->name("wishList.store");
Route::post('/wishList/add/{id}', 'WishListController@wishlistAdd')->name("wishlist.addToWish_list");
Route::get('/wishList/delete/{id}', 'WishListController@delete')->name("wishlist.delete");
Route::get('/wishList/show', 'WishListController@show')->name("user.wishList");

// Role Routes
Route::get('/role/destroy/{id}', 'RolesController@delete')->name("role.delete");
Route::resource('roles', 'RolesController')->middleware('can:isAdmin');

//User Routes
Route::get('/user/{username}/settings', 'UserController@userSettings')->name("user.settings");
Route::get('/users/{id}/edit', 'UserController@edit')->name("user.edit");
Route::post('/users/{id}/update', 'UserController@update')->name("user.update");

Route::get('/image/index', 'ImageController@index')->name("image.index");
Route::post('/image/save', 'ImageController@save')->name("image.save");

Route::get('/fish', 'FishController@index')->name("fish.index");

Auth::routes();

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

/* Cart Routes  */
Route::get('/cart/remove', 'ItemController@removeCart')->name("item.removeCart");
Route::get('/cart/cart', 'ItemController@cart')->name("item.cart");
Route::post('/cart/buy', 'OrderController@buy')->name("order.buy");

Route::post('/comment/save', 'CommentController@save')->name("comment.save");
Route::post('/wishList/save', 'WishListController@store')->name("wishList.store");
Route::post('/wishList/add/{id}', 'WishListController@wishlistAdd')->name("wishlist.addToWish_list");
Route::get('/wishList/show', 'WishListController@show')->name("user.wishList");
Route::get('/role/destroy/{id}', 'RolesController@destroy')->name("role.destroy");
Route::get('/user/destroy/{id}', 'UserController@destroy')->name("user.destroy");
Route::get('/user/{username}/settings', 'UserController@userSettings')->name("user.settings");
Route::resource('users', 'UserController')->middleware('can:isAdmin');
Route::resource('roles', 'RolesController')->middleware('can:isAdmin');
Route::get('dataTableUser' ,'UserController@dataTable')->name('dataTable');

Auth::routes();

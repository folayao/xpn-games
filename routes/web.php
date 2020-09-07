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

// Route::get('/', function () {
//     return view('header');
// });

Route::get('/home', 'HomeController@index')->name('home.index');
/* VideoGame Routes  */
Route::get('/videogames/show/{id}', 'VideoGameController@show')->name('videogame.show');
Route::get('/videogames/create', 'VideoGameController@create')->name('videogame.create');
Route::get('/videogames/delete/{id}','VideoGameController@delete')->name("videogame.delete");
Route::get('/', 'VideoGameController@list')->name('videogame.list');
Route::post('/videogames/save', 'VideoGameController@save')->name('videogame.save');




Auth::routes();


// Route::get('post', 'PostController@create')->name('post.create');
// Route::post('post', 'PostController@store')->name('post.store');
// Route::get('/posts', 'PostController@index')->name('posts');
// Route::get('/article/{post:slug}', 'PostController@show')->name('post.show');
// Route::post('/comment/store', 'CommentController@store')->name('comment.add');
// Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Route::get('/', 'HomeController@index')->name("home.index");
Route::get('/index', 'HomeController@index')->name("home.index");
Route::get('/contact', 'HomeController@contact')->name("contact.index");
Route::get('/product/index', 'ProductController@index')->name("product.index");
Route::get('/product/show/{id}', 'ProductController@show')->name("product.show");
Route::get('/product/create', 'ProductController@create')->name("product.create");
Route::post('/product/save', 'ProductController@save')->name("product.save");

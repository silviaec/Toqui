<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*
    Get: obtener algo.
    Post: Crear algo.
    Put: Modificar algo.
    Delete: Borrar algo.
*/

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/love', 'LoveController@store')->name('love');

Route::get('/profile/{id}', 'ProfileController@show')->name('profile');
Route::post('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/post/create', 'PostController@create')->name('post');
Route::post('/post', 'PostController@store')->name('post.create');
Route::get('/post/{title}/{post_id}', 'PostController@show')->name('post.show');

Route::post('/comment', 'CommentController@store')->name('comment.store');

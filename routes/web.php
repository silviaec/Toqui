<?php
use App\Http\Middleware\CheckKlass;

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

Route::get('/home', 'HomeController@index')->name('home')->middleware(CheckKlass::class);


Route::post('/message', 'MessageController@store')->name('message');
Route::get('/messages', 'MessageController@index')->name('messages');
Route::get('/messages/inbox/{user_id_to}', 'MessageController@inbox')->name('messages.inbox');

Route::get('/hashtags', 'HashtagController@getAll')->name('get.hashtags.all');


Route::get('/notifications', 'NotificationController@index')->name('get.notifications');
Route::get('/notifications/messages', 'NotificationController@getMessages')->name('get.notification.messages');
Route::get('/notifications/stream', 'NotificationController@stream')->name('get.notification.stream');
Route::post('/notifications/ok', 'NotificationController@ok')->name('get.notification.stream');

Route::post('/love', 'LoveController@store')->name('love');

Route::get('/profile/{id}', 'ProfileController@show')->name('profile');
Route::post('/profile', 'ProfileController@update')->name('profile.update');

Route::post('/upload/images', 'ImageController@store')->name('upload.images');


Route::get('/post/create', 'PostController@create')->name('post')->middleware(CheckKlass::class);
Route::post('/post', 'PostController@store')->name('post.create');

Route::get('/post/{title}/{post_id}', 'PostController@show')->name('post.show')->middleware(CheckKlass::class);

Route::get('/class/login', 'KlassController@login')->name('class.login.form');
Route::get('/class/create', 'KlassController@create')->name('class.create.form');
Route::post('/class/join', 'KlassController@join')->name('class.join');
Route::post('/class', 'KlassController@store')->name('class.create');
Route::get('/class/{id}', 'KlassController@change')->name('class.change');
Route::get('/class/classmates', 'KlassController@classmates')->name('class.classmate');

Route::post('/comment', 'CommentController@store')->name('comment.store');

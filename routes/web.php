<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Validator;

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
// login
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function() {
    // Post
    Route::get('/post', 'PostController@post'); //ページ表示
    Route::post('/post', 'PostController@upload'); // 投稿内容保存

    // Index
    Route::get('/index', 'IndexController@index'); //ページ表示
    Route::post('/index', 'PostController@upload');
    // Follow
    Route::post('/follow', 'FollowController@follow');
    Route::post('/follow/delete', 'FollowController@delete');
    // User
    Route::get('/user/{id}', 'UserController@user');
});

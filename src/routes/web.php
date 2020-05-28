<?php
use App\Post;
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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'UserController@index')->name('user');

// ミドルウェアによる認可
Route::put('/post/{post}', function (Post $post) {
    // 現在のユーザーはこのポストを更新できる
})->middleware('can:update,post');

// modelを必要としない方法
Route::post('/post', function () {
    // 現在のユーザーはポストを更新できる
})->middleware('can:create,App\Post');

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile', function() {
    // 認証済みのユーザーのみが入れる
})->middleware('auth');

// パスワードの確認
// Route::get('/settings/security', function () {
//     // ユーザーは続けるためにパスワードの入力が必要
// })->middleware(['auth', 'password.confirm']);
// または以下にすると再確認までの時間を調節可能
// })->middleware(['auth', 'auth.password_timeout']);




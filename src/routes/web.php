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

// HTTP基本認証(basic認証)
// HTTP基本認証により、専用の「ログイン」ページを用意しなくても手っ取り早くアプリケーションにユーザーをログインさせられます。
// これを使用するには、ルートにauth.basicミドルウェアを付けてください。
// auth.basicミドルウェアはLaravelフレームワークに含まれているので、定義する必要はありません。
Route::get('profile', function() {
    // 認証済みのユーザーのみが入れる
})->middleware('auth.basic');

// ステートレスなbasic認証
Route::get('api/user', function() {
    // 認証済みのユーザーのみが入れる
})->middleware('auth.basic.once');

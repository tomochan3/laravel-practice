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

Route::get('user', 'UserController@show')->name('user');

Route::get('home', function () {
    // セッションから一つのデータを取得する
    $value = session('key');

    // デフォルト値を指定する場合
    $value = session('key', 'default');

    // セッションへ一つのデータを保存する
    session(['key' => 'value']);

    return session()->get('key');

});

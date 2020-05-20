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


Route::get('welcome/{locale}', function ($locale) {
    // 現在のlocalの値を取得
    $locale = App::getLocale();
    if (App::isLocale('en')) {
        App::setLocale($locale);
        return view('english');
    } elseif (App::isLocale('ja')) {
        return view('japan');
    }
});

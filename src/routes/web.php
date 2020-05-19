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

Route::get('post/create', 'PostController@create')->name('form');

Route::post('confirm', 'PostController@store')->name('confirm');

Route::get('validate', 'ValidateConfirmController@create')->name('validate_form');

Route::post('validate_confirm', 'ValidateConfirmController@store')->name('validate_confirm');

<?php

use Illuminate\Http\Request;


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

Route::get('user', 'UserController@store');

Route::put('user/{id}', 'UserController@update');

Route::get('/', function (Request $request) {
    return 'hello';
});

Route::get('path', 'UserController@path')->name('path');

Route::post('post', 'UserController@post')->name('post');

Route::get('psr','UserController@psr');

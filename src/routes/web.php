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

Route::get('/user', 'UserController@index')->name('user');

// Route::get('users', function () {
//     $users = App\User::paginate(15);

//     $users->withPath('custom/url');
//     return view('user.index', ['users' => $users]);
//     //
// });

Route::get('users', function () {
    return App\User::paginate();
});

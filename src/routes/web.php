<?php

use App\Http\Resources\User as UserResource;
use App\User;
use App\Http\Resources\UserCollection;

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


// Route::get('/user', function () {
//     return new UserResource(User::find(1));
// });

// Route::get('/user', function () {
//     return UserResource::collection(User::all());
// });

// Route::get('/users', function () {
//     return new UserCollection(User::all());
// });

// preserveKeysプロパティがtrue コレクションのキーは保持されるようになります。
// Route::get('/user', function () {
//     return UserResource::collection(User::all()->keyBy->id);
// });

// Route::get('/user', function () {
//     return new UserResource(User::find(1));
// });

Route::get('/users', function () {
    return new UserCollection(User::all());
});

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

// 通常のコントローラーの処理
// Route::get('user/{id}', 'UserController@show');

//シングルアクションコントローラー__invokeの確認
Route::get('user/{id}', 'ShowProfile');

Route::get('foo', 'Photos\AdminController@method');

Route::get('profile', 'UserController@show')->middleware('auth');

//　リソースコントローラの確認
Route::resource('photos', 'PhotoController');

// リソースコントローラの書き方2
// Route::resources([
//     'photos' => 'PhotoController',
//     'posts' => 'PostController'
// ]);

// 部分的なリソースコントローラの使い方
Route::resource('photos', 'PhotoController')->only([
    'index', 'show'
]);

Route::resource('photos', 'PhotoController')->except([
    'create', 'store', 'update', 'destroy'
]);

// createやedit を削除する
Route::apiResource('photos', 'PhotoController');

Route::apiResources([
    'photos' => 'PhotoController',
    'posts' => 'PostController'
]);

// ネストしたリソース /photos/{photo}/comments/{comment}
Route::resource('photos.comments', 'PhotoCommentController');

// Shallowネスト
// photos/{photo}/comments          GET
// photos/{photo}/comments/create   GET
// photos/{photo}/comment           POST
// comments/{comment}               GET
// comments/{comment}/edit          GET
// comments/{comment}               PUT/PATCH
// comments/{comment}               DELETE
Route::resource('photos.comments', 'CommentController')->shallow();

Route::resource('photos', 'PhotoController')->names([
    'create' => 'photos.build'
]);

Route::resource('users', 'AdminUserController')->parameters([
    'users' => 'admin_user'
]);

//リソースコントローラへのルート追加 resourceが優先される
Route::get('photos/popular', 'PhotoController@method');
Route::resource('photos', 'PhotoController');





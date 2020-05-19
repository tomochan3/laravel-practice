<?php
use App\Http\Middleware\CheckAge;
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

// middleware confirm
Route::get('/middleware_input', 'MiddlewareConfirmController@index')->name('middlewareInput');
Route::post('/middleware_confirm', 'MiddlewareConfirmController@confirm')->name('middlewareConfirm')->middleware('check');
Route::get('/middleware_redirect', 'MiddlewareConfirmController@redirect')->name('middlewareRedirect');
// middlewareparameter confirm
Route::get('/middleware_parameter', 'MiddlewareConfirmController@parameter')->name('middlewareParameter')->middleware('role:editor');

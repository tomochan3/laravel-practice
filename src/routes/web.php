<?php
use Carbon\Carbon;
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

Route::get('/hello', function () {
    return 'Hello World';
});

// 配列をJSONレスポンスへ変換します。
Route::get('/hoge', function () {
    return [1, 2, 3];
});

// レスポンスオブジェクト
// 完全なResponseインスタンスを返す
// 完全なResponseインスタンスを返せば、
// レスポンスのHTTPステータスコードやヘッダをカスタマイズできます。
// Responseインスタンスは、Symfony\Component\HttpFoundation\Responseクラスを継承しており、
// HTTPレスポンスを構築するためにさまざまなメソッドを提供しています。
Route::get('home', function () {
    return response('Hello World', 200)
                  ->header('Content-Type', 'text/plain');
});

Route::get('home2', function () {
    $content = 'hoge';
    $type = 'content';
    return response($content)
                ->header('Content-Type', $type)
                ->header('X-Header-One', 'Header Value')
                ->header('X-Header-Two', 'Header Value');
});

// withHeadersメソッドで、レスポンスへ追加したいヘッダの配列を指定します。
Route::get('home3', function () {
    $content = 'hoge';
    $type = 'content';
    return response($content)
            ->withHeaders([
                'Content-Type' => $type,
                'X-Header-One' => 'Header Value',
                'X-Header-Two' => 'Header Value',
            ]);
});

// Cookieの付与
Route::get('home4', function () {
    $content = 'hoge';
    $type = 'content';
    $minutes = Carbon::now();

    return response($content)
                ->header('Content-Type', $type)
                ->cookie('name', 'value', $minutes);
});

// Cookieの付与
Route::get('home5', function () {
    $minutes = 10;
    dd(Cookie::queue(Cookie::make('name', 'value', $minutes)));
    Cookie::queue('name', 'value', $minutes);


    return response($content)
                ->header('Content-Type', $type)
                ->cookie('name', 'value', $minutes);
});


// リダイレクト
Route::get('dashboard', function () {
    return redirect('home/dashboard');
});

Route::get('home/dashboard',function() {
    return 'hoge';
});

Route::post('user/profile', function () {
    // レスポンスのバリデーション処理…

    return back()->withInput();
});


Route::get('show', 'UserController@show')->name('user');
Route::post('confirm', 'UserController@confirm')->name('confirm');

Route::get('show2', 'UserController@show2')->name('show2');

Route::post('user/profile', function () {
    // ユーザープロフィールの更新処理…

    return redirect('abc')->with('status', 'Profile updated!');
});

Route::get('abc', 'UserController@show3')->name('show3');

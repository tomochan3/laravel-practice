<?php
use App\Http\Middleware\First;
use App\Http\Middleware\Second;
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

Route::get('foo', function () {
    return 'Hello World';
});

Route::get('/user', 'UserController@index');

// 複数のHTTP動詞に対応したルートを登録
Route::match(['get', 'post'], '/hoge', function () {
    //
    return 'hoge';
});

// 全HTTP動詞に対応
Route::any('/hoge2', function () {
    //
    return 'hoge2';
});

// リダイレクト確認(通常302が返る:元のURLのまま表示される)
Route::redirect('/here', '/there');
Route::get('/there', function() {
    return 'hoge';
});

// リダイレクト確認301(301の場合はリダイレクト先の新しいURLが返る)
Route::redirect('/here2', '/abc', 301);
Route::get('/abc', function() {
    return 'fuga';
});
// 301ステータスコードが返る
Route::permanentRedirect('/here', '/there');

// ビュールート(最初の引数にURI、ビュー名は第２引数、オプションの第３引数はビューへ渡すデータの配列)
Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

// ルートパラメーターを定義(ルートパラメータはいつも{}で囲む、「-」は使えない「_」は使用可能)
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});

//　ルートで必要なだけパラメータを定義
Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Hello'.$postId.$commentId;
});

// 任意パラメータ　パラメータ名の後に?を付けると、任意指定のパラメータになる
Route::get('parameter/{name?}', function ($name = null) {
    return $name;
});
Route::get('parameter2/{name?}', function ($name = 'John') {
    return $name;
});

// 正規表現制約(ルートインスタンスのwhereメソッドを使用し、ルートパラメータのフォーマットを制約)
Route::get('where/{name}', function ($name) {
    //
})->where('name', '[A-Za-z]+');


Route::get('where2/{id}', function ($id) {
    //
})->where('id', '[0-9]+');

Route::get('where3/{id}/{name}', function ($id, $name) {
    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

//　グローバル制約確認
Route::get('global/{id}', function ($id) {
    // {id}が数値の場合のみ実行される
    return '数値の場合のみ';
});

// スラッシュのエンコード(Laravelのルーティングコンポーネントは、/を除くすべての文字を許可している)
Route::get('search/{search}', function ($search) {
    return $search;
})->where('search', '.*');


// 名前付きルート(名前付きルートは特定のルートへのURLを生成したり、リダイレクトしたりする場合に便利)
Route::get('user/profile', function () {
    //
})->name('profile');


// コントローラアクションに対しても名前を付け可能
Route::get('user/profile/name', 'UserProfileController@show')->name('profile');

Route::get('user/{id}/profile', function ($id) {
    return 'hoge';
})->name('profile');

// ルートグループ
// ミドルウェア
Route::middleware(['first', 'second'])->group(function () {
    Route::get('/abc', function () {
        // firstとsecondミドルウェアを使用
    });

    Route::get('user/profile', function () {
        // firstとsecondミドルウェアを使用
    });
});

//　名前空間
Route::namespace('Admin')->group(function () {
    // "App\Http\Controllers\Admin"名前空間下のコントローラ
    Route::get('/hello', 'AdminUserController@show');
});

// サブドメインルーティングApp\Http\Controllers名前空間をコントローラルート登録時に毎回指定しなくても済むように、
// デフォルトでRouteServiceProviderが名前空間グループの中でroutes.phpファイルを読み込み、指定している
Route::domain('{account}.myapp.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});

// ルートプレフィクス グループ内の各ルートに対して、指定されたURIのプレフィックスを指定するために使用
Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        // Matches The "/admin/users" URL
    });
});

// ルート名プリフィックス
Route::name('admin.')->group(function () {
    Route::get('users', function () {
        // "admin.users"という名前へ結合したルート…
    })->name('users');
});

// 暗黙の結合 一致するモデルインスタンスがデータベースへ存在しない場合、404 HTTPレスポンスが自動的に生成される
Route::get('api/users/{user}', function (App\User $user) {
    return $user->email;
});

Route::get('profile/{user}', function (App\User $user) {
    //

});

// フォールバックルート　webミドルウェアグループの中のすべてのミドルウェアで、このルートが適用
// フォールバックルートは、アプリケーションのルート登録で常に一番最後に行わなければならない
Route::fallback(function () {
    //
});

// レート制限
// 認証済みのユーザーが１分間に６０回のアクセスを許すルートグループ
Route::middleware('auth:api', 'throttle:60,1')->group(function () {
    Route::get('/user1', function () {
        return 'hoge';
    });
});

//　動的レート制限
Route::middleware('auth:api', 'throttle:rate_limit,1')->group(function () {
    Route::get('/user2', function () {
        return 'hoge';
    });
});

// ゲストと認証ユーザー別のレート制限
Route::middleware('auth:api', 'throttle:10|rate_limit,1')->group(function () {
    Route::get('/user3', function () {
        return 'hoge';
    });
});

// レート制限区分
Route::middleware('auth:api')->group(function () {
    Route::middleware('throttle:60,1,default')->group(function () {
        Route::get('/servers', function () {
            return 'hoge';
        });
    });

    Route::middleware('throttle:60,1,deletes')->group(function () {
        Route::delete('/servers/{id}', function () {
            return 'hoge';
        });
    });
});

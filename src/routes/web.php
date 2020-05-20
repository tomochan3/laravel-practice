<?php
// ビューファサード
use Illuminate\Support\Facades\View;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    // return view('greeting', ['name' => 'James']);
    $data = ['name' => 'James'];
    return view('admin.profile', $data);
});

Route::get('/exists', function () {
    if (View::exists('emails.customer')) {
        //
        return 'success!!';
    }
});

// firstメソッドは、指定したビュー配列の中で、最初に存在するビューを作成します。
// これはアプリケーションやパッケージで、ビューをカスタマイズ、上書きする場合に役立ちます。
// custom.adminがない場合、adminのviewに渡す

Route::get('/view',function() {
    $data = ['name' => 'James'];
    return view()->first(['custom.admin', 'admin'], $data);
    // または
    return View::first(['custom.admin', 'admin'], $data);
});


Route::get('personal',function() {
    return view('greeting')->with('name', 'Victoria');
});

View::creator('profile', 'App\Http\View\Creators\ProfileCreator');

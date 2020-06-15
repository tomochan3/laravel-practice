<?php

use App\DripEmailer;
use App\User;

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

Artisan::command('build {project}', function ($project) {
    $this->info("Building {$project}!");
});

// Artisan::command('email:send {user}', function (DripEmailer $drip, $user) {
//     $drip->send(User::find($user));
// });

// Artisan::command('build {project}', function ($project) {
//     $this->info("Building {$project}!");
// })->describe('Build the project');

Artisan::command('test {project}', function ($project) {
    $this->info("Test {$project}!");
});

// プログラムによるコマンド実行
// Route::get('/foo', function () {
//     $exitCode = Artisan::call('email:send', [
//         'user' => 1, '--queue' => 'default'
//     ]);

//     //
// });
// または
// Artisan::call('email:send 1 --queue=default');


// Route::get('/foo', function () {
//     Artisan::queue('email:send', [
//         'user' => 1, '--queue' => 'default'
//     ]);

//     //
// });


Artisan::queue('email:send', [
    'user' => 1, '--queue' => 'default'
])->onConnection('redis')->onQueue('commands');


Route::get('/foo', function () {
    $exitCode = Artisan::call('email:send', [
        'user' => 1, '--id' => [5, 13]
    ]);
});

$exitCode = Artisan::call('migrate:refresh', [
    '--force' => true,
]);

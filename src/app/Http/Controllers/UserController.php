<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
// use App\Repositories\UserRepository;

class UserController extends Controller
{
    /**
     * ユーザーリポジトリインスタンス
     */
    // protected $users;

    // /**
    //  * 新しいコントローラインスタンスの生成
    //  *　注入する時にタイプヒントを使って呼び出せるかの確認
    //  * @param  UserRepository  $users
    //  * @return void
    //  */
    // public function __construct(UserRepository $users)
    // {
    //     $this->users = $users;
    // }

    /**
     * 指定ユーザーのプロフィール表示
     *
     * @param  int  $id
     * @return View
     */
    //routeでmiddlewareを定義しない場合、controllerのconstructで確認が可能
    // public function __construct()
    // {
    //     $this->middleware('auth');

    //     $this->middleware('log')->only('index');

    //     $this->middleware('subscribed')->except('store');
    //     //クロージャを使って指定も可能
    //     $this->middleware(function ($request, $next) {
    //         // ...

    //         return $next($request);
    //     });
    // }


    public function show($id)
    {
        return view('user.profile', [
            'user' => User::findOrFail($id),
            'word' => 'hello'
        ]);
    }
}

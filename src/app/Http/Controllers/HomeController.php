<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * コントローラを使っていれば、ルート定義へ付加する代わりに、
     * コントローラのコンストラクターでmiddlewareメソッドを呼び出すことができます。
     * @return void
     */
    public function __construct()
    {
        // authの指定
        $this->middleware('auth');
        // ガードの指定
        $this->middleware('auth:api');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // 現在認証されているユーザーの取得
        $user = Auth::user();
        // 現在認証されているユーザーのID取得
        $id = Auth::id();

        return view('home');
    }

    protected function guard()
    {
        return Auth::guard('guard-name');
    }

    /**
     * ユーザーをリダイレクトさせるパスの取得
     * 未認証ユーザーのリダイレクト
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        return route('login');
    }

    public function __construct()
    {
        $this->middleware('auth:api');
    }
}

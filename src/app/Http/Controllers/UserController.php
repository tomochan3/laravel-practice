<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use app;

class UserController extends Controller
{
    /**
     * アプリケーションの全ユーザー表示
     *
     * @return Response
     */
    public function index()
    {
        // paginate ページごとに15アイテムを表示する
        $users = DB::table('users')->paginate(15);


        // $users = DB::table('users')->simplePaginate(15);

        // ページネータカスタマイズ


        return view('user.index', ['users' => $users]);
    }
}

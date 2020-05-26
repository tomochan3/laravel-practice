<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * ユーザープロフィールの更新
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        // $request->user()は認証済みユーザーのインスタンスを返す
        if (Auth::check()) {
            // ユーザーはログインしている
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;

class ShowProfile extends Controller
{
    /**
     * 指定ユーザーのプロフィール表示
     * シングルアクションコントローラー__invokeの確認
     *
     * @param  int  $id
     * @return View
     */
    public function __invoke($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}

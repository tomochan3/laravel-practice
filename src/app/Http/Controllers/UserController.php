<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        dd($phone = User::find(1)->phone);

        $comments = App\Post::find(1)->comments;

        foreach ($comments as $comment) {
            // dd($comment);
        }

        // $comment = App\Post::find(1)->comments()->where('title', 'foo')->first();
        $user = App\User::find(1);

        foreach ($user->roles as $role) {
            //dd($role);
        }

        $roles = App\User::find(1)->roles()->orderBy('name')->get();

        $user = App\User::find(1);

        foreach ($user->roles as $role) {
            echo $role->pivot->created_at;
        }

        $user = App\User::find(1);

        // 中間テーブル取得
        foreach ($user->roles as $role) {
            echo $role->pivot->created_at;
        }

    }
}

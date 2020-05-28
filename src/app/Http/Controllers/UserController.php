<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use App\Post;

class UserController extends Controller
{
    public function index(Request $user)
    {
        $post = null;
        if (Gate::forUser($user)->allows('update-post', $post)) {
            return view('user');
        }

        if ($user->can('create', Post::class)) {
            // 関連するポリシーの"create"メソッドが実行される
        }

    }
}

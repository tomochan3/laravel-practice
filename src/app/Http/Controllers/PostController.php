<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // リソースコントローラの認可
    public function __construct()
    {
        $this->authorizeResource(Post::class, 'post');
    }

    /**
     * 指定したポストの更新
     *
     * @param  Request  $request
     * @param  Post  $post
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        // 現在のユーザーはブログポストの更新が可能
    }

    // モデルを必要としない方法
    /**
     * 新しいブログポストの生成
     *
     * @param  Request  $request
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Request $request)
    {
        $this->authorize('create', Post::class);

        // 現在のユーザーはブログポストを生成できる
    }
}

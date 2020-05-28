<?php

namespace App\Policies;

use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use App\Post;
use App\User;

class PostPolicy
{
    // protected function update()
    // {
    //     Gate::guessPolicyNamesUsing(function ($modelClass) {
    //         // ポリシークラス名を返す
    //     });
    // }


    // public function update(User $user, Post $post)
    // {
    //     return $user->id === $post->user_id;
    // }

    /**
     * このユーザーにより、指定ポストが更新できるか判定
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return \Illuminate\Auth\Access\Response
     */
    public function update(User $user, Post $post)
    {
        Gate::authorize('update', $post);

        $response = Gate::inspect('update', $post);

        if ($response->allowed()) {
            // アクションは認可された…
        } else {
            echo $response->message();
        }

        // return $user->id === $post->user_id
        //             ? Response::allow()
        //             : Response::deny('You do not own this post.');

        // guest　user
        return optional($user)->id === $post->user_id;
    }

    /**
     * 指定されたユーザーがポストを作成できるかを決める
     *
     * @param  \App\User  $user
     * @return bool
     */
    public function create(User $user)
    {
        //
    }

    public function before($user, $ability, Post $post)
    {
        // if ($user->isSuperAdmin()) {
        //     return true;
        // }

        if ($user->can('update', $post)) {
            //
        }
    }

}

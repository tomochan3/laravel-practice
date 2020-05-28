<?php

namespace App\Providers;

use App\Policies\PostPolicy;
use App\Post;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    /**
     * 全認証／認可サービスの登録
     *
     * @return void
     */
    // public function boot()
    // {
    //     $this->registerPolicies();

    //     Gate::define('edit-settings', function ($user) {
    //         return $user->isAdmin;
    //     });

    //     Gate::define('update-post', function ($user, $post) {
    //         return $user->id === $post->user_id;
    //     });
    // }

    /**
     * 全認証／認可サービスの登録
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // コントローラのように、ゲートはClass@method形式のコールバック文字列を使い定義することも可能です。
        // Gate::define('update-post', 'App\Policies\PostPolicy@update');

        // /*
        // * gateを使用しアクションを認可する
        // */
        // if (Gate::allows('edit-settings')) {
        //     // 現在のユーザーは設定を変更できる
        // }

        // if (Gate::allows('update-post', $post)) {
        //     // 現在のユーザーはこのポストを更新できる
        // }

        // if (Gate::denies('update-post', $post)) {
        //     // 現在のユーザーはこのポストを更新できない
        // }

        // Gate::authorize('update-post', $post);

        // Gate::define('create-post', function ($user, $category, $extraFlag) {
        //     return $category->group > 3 && $extraFlag === true;
        // });
        // if (Gate::check('create-post', [$category, $extraFlag])) {
        //     // このユーザーはポストを新規作成できる
        // }

        // Gate::define('edit-settings', function ($user) {
        //     return $user->isAdmin
        //                 ? Response::allow()
        //                 : Response::deny('You must be a super administrator.');
        // });

        // $response = Gate::inspect('edit-settings', $post);
        // if ($response->allowed()) {
        //     // アクションは認可された…
        // } else {
        //     echo $response->message();
        // }

        // Gate::authorize('edit-settings', $post);
        // // アクションは認可された…

        // Gate::before(function ($user, $ability) {
        //     if ($user->isSuperAdmin()) {
        //         return true;
        //     }
        // });

        // Gate::after(function ($user, $ability, $result, $arguments) {
        //     if ($user->isSuperAdmin()) {
        //         return true;
        //     }
        // });
    }
}

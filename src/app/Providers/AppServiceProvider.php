<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

   /**
     * 全アプリケーションサービスの初期処理
     * 一番外部のリソースでラップしないようにしたい場合は、ベースのリソースクラスに対し、withoutWrappingメソッドを使用
     * @return void
     */
    public function boot()
    {
        Resource::withoutWrapping();
    }
}

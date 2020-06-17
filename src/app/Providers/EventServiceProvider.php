<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * アプリケーションのイベントリスナをマップ
     *
     * @var array
     */
    protected $listen = [
        'App\Events\OrderShipped' => [
            'App\Listeners\SendShipmentNotification',
        ],
    ];


    /**
     * アプリケーションの他のイベントを登録する
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Event::listen('event.name', function ($foo, $bar) {
            //
        });
        // ワイルドカードリスナ
        Event::listen('event.*', function ($eventName, array $data) {
            //
        });
    }

    /**
     * イベントとリスナを自動的に検出するか指定
     * デフォルトではこれが無効になっているから手動でtrueにしてあげる。
     * こいつをオーバーライドする。こいつがtrueになっていると全てtrueになる
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }

    /**
     * イベントを見つけるために使用するリスナディレクトリの取得
     * スキャンする追加のディレクトリを定義したい場合こいつをオーバーライドする
     * @return array
     */
    protected function discoverEventsWithin()
    {
        return [
            $this->app->path('Listeners'),
        ];
    }
}

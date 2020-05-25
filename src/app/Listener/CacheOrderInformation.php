<?php

namespace App\Listeners;

use App\Events\OrderWasPlaced;
use App\User;
use Illuminate\Contracts\Redis\Factory;

class CacheOrderInformation
{
    /**
     * Redisファクトリの実装
     */
    protected $redis;

    /**
     * 新しいイベントハンドラの生成
     *
     * @param  Factory  $redis
     * @return void
     */
    public function __construct(Factory $redis)
    {
        $this->redis = $redis;
    }

    /**
     * イベントの処理
     *
     * @param  OrderWasPlaced  $event
     * @return void
     */
    public function handle(OrderWasPlaced $event)
    {
        //
    }
}

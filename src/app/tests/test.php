<?php

namespace App\tests;
use Illuminate\Support\Facades\Cache;

/**
 * 基本的なテスト機能の例
 *
 * @return void
 */
class test{
    public function test()
    {
        Cache::shouldReceive('get')
             ->with('key')
             ->andReturn('value');

        $this->visit('/cache')
             ->see('value');
    }

}

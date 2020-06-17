<?php

namespace App\Jobs;

use App\AudioProcessor;
use App\Podcast;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $podcast;

    /**
     * ジョブがタイムアウトになるまでの秒数
     *
     * @var int
     */
    public $timeout = 120;

    /**
     * このジョブを処理するキュー接続
     *
     * @var string
     */
    public $connection = 'sqs';


    /**
     * 最大試行回数
     *
     * @var int
     */
    public $tries = 5;

    /**
     * タイムアウトになる時間を決定
     *
     * @return \DateTime
     */
    public function retryUntil()
    {
        return now()->addSeconds(5);
    }

    Redis::throttle('key')->allow(10)->every(60)->then(function () {
        // ジョブのロジック処理…
    }, function () {
        // ロックできなかった場合の処理…
    
        return $this->release(10);
    });

    Redis::funnel('key')->limit(1)->then(function () {
        // ジョブのロジック処理…
    }, function () {
        // ロックできなかった場合の処理…
    
        return $this->release(10);
    });

    $podcast = App\Podcast::find(1);

dispatch(function () use ($podcast) {
    $podcast->publish();
}

    /**
     * 新しいジョブインスタンスの生成
     *
     * @param  Podcast  $podcast
     * @return void
     */
    public function __construct(Podcast $podcast)
    {
        Redis::throttle('key')->block(0)->allow(1)->every(5)->then(function () {
            info('Lock obtained...');
    
            // ジョブの処理…
        }, function () {
            // ロック取得ができない…
    
            return $this->release(5);
        });
    }

    /**
     * ジョブの実行
     *
     * @param  AudioProcessor  $processor
     * @return void
     */
    public function handle(AudioProcessor $processor)
    {
        // アップロード済みポッドキャストの処理…
    }
}

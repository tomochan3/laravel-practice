<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\ProcessPodcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    /**
     * 新ポッドキャストの保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // ポッドキャスト作成…

        ProcessPodcast::dispatch($podcast);

        // 遅延dispatch
        ProcessPodcast::dispatch($podcast)
                ->delay(now()->addMinutes(10));

        //　同期ディスパッチ
        ProcessPodcast::dispatchNow($podcast);

        //　ジョブチェーン
        ProcessPodcast::withChain([
            new OptimizePodcast,
            new ReleasePodcast
        ])->dispatch();

        // チェーンの接続とキュー
        ProcessPodcast::withChain([
            new OptimizePodcast,
            new ReleasePodcast
        ])->dispatch()->allOnConnection('redis')->allOnQueue('podcasts');

        // 特定キューへのディスパッチ
        ProcessPodcast::dispatch($podcast)->onQueue('processing');

        // 特定の接続へのディスパッチ
        ProcessPodcast::dispatch($podcast)->onConnection('sqs');

        ProcessPodcast::dispatch($podcast)
              ->onConnection('sqs')
              ->onQueue('processing');
    }
}

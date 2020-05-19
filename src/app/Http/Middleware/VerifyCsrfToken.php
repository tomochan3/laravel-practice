<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

//　リクエスト中のトークンとセッションに保存されているトークンが一致するか、確認
class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * CSRFバリデーションから除外するURI
     *
     * @var array
     */
    protected $except = [
        // 学習用のuri 自動的にCSRFミドルウェアは無効になる
        'stripe/*',
        'http://example.com/foo/bar',
        'http://example.com/foo/*',
    ];
}

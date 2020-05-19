<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

// reportとrenderがあると自動的にflameworkから呼び出される
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     * 例外の無視
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     * 例外をログするか、FlareやBugSnag、Sentryのような外部サービスへ送信するために使います。
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        // 異なった例外を別々の方法でレポートする必要がある場合、PHPのinstanceof比較演算子を使う
        if ($exception instanceof CustomException) {
            //
        }

        parent::report($exception);
    }

    /**
     *  HTTPレスポンスへ例外をレンダー
     * Render an exception into an HTTP response.
     * renderメソッドは与えられた例外をブラウザーに送り返すHTTPレスポンスへ変換することに責任を持っています。
     * デフォルトで例外はベースクラスに渡され、そこでレスポンスが生成されます。
     * しかし例外のタイプをチェックし、お好きなようにレスポンスを返してかまいません。
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof CustomException) {
            return response()->view('errors.custom', [], 500);
        }

        return parent::render($request, $exception);
    }

    /**
     * ログのデフォルトコンテキスト変数の取得
     *
     * @return array
     */
    protected function context()
    {
        return array_merge(parent::context(), [
            'foo' => 'bar',
        ]);
    }

    public function isValid($value)
    {
        try {
            // 値の確認…
        } catch (Exception $e) {
            report($e);

            // HTTP例外
            // return abort(404);
            // abortは即座に例外を発生させ、その例外は例外ハンドラによりレンダーされる
            return abort(403, 'Unauthorized action.');
        }
    }
}

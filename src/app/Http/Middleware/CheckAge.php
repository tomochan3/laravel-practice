<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    /**
     * 送信されてきたリクエストの処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //すべてのミドルウェアは、サービスコンテナにより、依存解決され,ミドルウェアのコンストラクタに、必要な依存をタイプヒントで指定できます。
    public function handle($request, Closure $next)
    {
        // dd($request->age);
        if ($request->age <= 200) {
            return redirect('middlewareRedirect');
        }

        // アプリケーションの先へリクエストを通す($requestを渡し$nextコールバックを呼び出す)
        return $next($request);
    }

}

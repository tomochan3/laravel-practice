<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        // roleの受け渡しが出来ているかの確認
        if ($role) {
            // リダイレクト処理…
            redirect('middlewareInput');
        }

        return $next($request);
    }
}

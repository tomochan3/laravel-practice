<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordController extends Controller
{
    /**
     * ユーザーパスワードを更新
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        // 新しいパスワードの長さのバリデーション…

        // Bcryptアルゴリズムを使用する場合
        // $hashed = Hash::make('password', [
        //     'rounds' => 12
        // ]);

        // Argon2アルゴリズムを使用する場合
        $hashed = Hash::make('password', [
            'memory' => 1024,
            'time' => 2,
            'threads' => 2,
        ]);

        $request->user()->fill([
            'password' => Hash::make($request->newPassword)
        ])->save();

    }
}

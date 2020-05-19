<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 指定されたユーザーのプロフィールを表示
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request, $id = null)
    {

        // セッション中のアイテム存在を確認
        if ($request->session()->has('users')) {
            //
        }

        // セッションへデータを保存する場合、通常putメソッドか、sessionヘルパを使用します。
        $request->session()->put('key', 'value');
        // グローバルヘルパ使用
        session(['key' => 'value']);

        // 配列セッション値の追加
        $request->session()->push('user.teams', 'developers');

        // 取得後アイテムを削除
        $value = $request->session()->pull('key', 'default');

        // 次のリクエスト間だけセッションにアイテムを保存 flash
        $request->session()->flash('status', 'Task was successful!');

        // フラッシュデータをその先のリクエストまで持続させたい reflash
        $request->session()->reflash();

        // 特定のフラッシュデータのみ持続させたい場合は、keepメソッドを使います。
        $request->session()->reflash();

        // データ削除
        // １キーを削除
        $request->session()->forget('key');

        // 複数キーを削除
        $request->session()->forget(['key1', 'key2']);

        // セッションから全データを削除
        $request->session()->flush();

        // セッションIDの再生成 session fixation攻撃を防ぐために行います。
        $request->session()->regenerate();



        // session全データ取得
        $data = $request->session()->all();

        //　セッションを取得
        $value = $request->session()->get('key');

        // 第二引数はsessionに第一引数が存在していなかったら返される
        $value = $request->session()->get('key', 'default');

        // 何もなければクロージャが実行
        $value = $request->session()->get('key', function () {
            return 'default';
        });


    }
}

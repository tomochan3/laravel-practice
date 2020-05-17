<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(Request $request)
    {
        return view('input');
    }

    public function confirm(Request $request)
    {
        // redirectの確認
        // return view('confirm');
        // return redirect()->route('user');

        // $user = 'a';
        // return redirect()->route('show2', [$user]);

        // コントローラアクションへのリダイレクト
        // return redirect()->action('UserController@show');

        // コントローラルートにパラメーターが必要ならば、actionメソッドの第２引数として渡してください。
        // return redirect()->action(
        //     'UserController@show', ['id' => 1]
        // );

        // 外部に飛ばす
        // return redirect()->away('https://www.google.com');

        // return redirect()->action('UserController@show3');
        // $data = ['a' => 'b'];
        // $type = 'type';
        // return response()
        //     ->view('show', $data, 200)
        //     ->header('Content-Type', $type);

        // jsonを返す
        // return response()->json([
        //     'name' => 'Abigail',
        //     'state' => 'CA'
        // ]);

        // jsonを返す
        // return response()
        //     ->json(['name' => 'Abigail', 'state' => 'CA'])
        //     ->withCallback($request->input('callback'));

        // Fileダウンロード
        // return response()->download($pathToFile);

        // return response()->download($pathToFile, $name, $headers);

        // return response()->download($pathToFile)->deleteFileAfterSend();

        // streamダウンロード
        // return response()->streamDownload(function () {
        //     echo GitHub::api('repo')
        //                 ->contents()
        //                 ->readme('laravel', 'laravel')['contents'];
        // }, 'laravel-readme.md');

        // Fileレスポンス
        // return response()->file($pathToFile);

        // return response()->file($pathToFile, $headers);
    }


    public function show2(Request $request)
    {
        return view('show')->with(['request' => $request]);
    }

    public function show3(Request $request)
    {
        return view('flash')->with(['request' => $request]);
    }

    /**
     * モデルのルートキー値の取得
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        return $this->slug;
    }
}

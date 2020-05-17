<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// PSR-7の確認
use Psr\Http\Message\ServerRequestInterface;
// cookieファサード
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    /**
     * 新しいユーザーを保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        return view('user');
    }

    /**
     * 指定したユーザーの更新
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //

    }

    /**
     * リクエストパスメソッドの確認
     *
     * @param  Request  $request
     * @return Response
     */
    public function path(Request $request)
    {

        // path1が返る
        $uri = $request->path();
        // dd($uri);

        // リクエストのURIが指定されたパターンに合致するかを確認true/false
        $path = $request->is('path/*');
        // この場合true
        //dd($path);
        //この場合false
        $hoge = $request->is('hoge/*');

        // urlを取得
        $url = $request->url();
        // dd($url);

        //クエリ文字つき urlに?何か文字=1など
        $url = $request->fullUrl();
        // dd($url);

        // HTTP動詞の確認 この場合GETが取れる
        $method = $request->method();


        return view('path',compact('request'));
    }

    /* ServerRequestInterface の学習
    * RequestInterfaceを継承
    * super globalが使える
    * 参考
    * https://qiita.com/kzbandai/items/3bda420412e1c3583b9b
    */
    public function psr(ServerRequestInterface $request)
    {

        // psr-7の確認
        $request = $_COOKIE;
        // dd($request);

        $request = $request->withHeader('foo', 'bar');
        // dd($request);
    }

    public function post(Request $request) {
         // ポストかどうかを調べる
         if ($request->isMethod('post')) {
           // if ($request->isMethod('post')) {
            //     // requestを全て取得
            //     $input = $request->all();
            //     dd($input);
            //     return view('path_confirm');
            // }

            //inputメソッドには第2引数としてデフォルト値を指定できます。この値はリクエストに指定した入力値が存在していない場合に返されます。
            // $name = $request->input('name', 'Sally');
            // if ($name) {
            //     dd($name);
            //     return view('path_confirm');
            // }

            // 配列での入力を含むフォームを取り扱うときは、「ドット」記法で配列へアクセスできます。
            // dd($request->input());
            $name = $request->input('products.0.name');
            if ($name) {
                // dd($name);
                return view('path_confirm');
            }

            //クエリストリングを取得
            $name = $request->query('name');
            // dd($name);

            //要求したクエリストリング値が存在しない場合、このメソッドの第２引数が返ってきます。
            $name = $request->query('name', 'Helen');
            // dd($name);

            // クエリパラメータの取得
            $query = $request->query();
            // dd($query);

            //　動的プロパティのnameを取得
            $name = $request->name;

            // JSON入力値の取得
            // JSON配列の深い要素へアクセスするために、「ドット」記法も使用できます。
            // アプリケーションにJSONリクエストが送られ、Content-Typeヘッダプロパティにapplication/jsonが指定されていたら、inputメソッドによりJSON情報へアクセスできます。
            $name = $request->input('user.name');

            // 論理入力値の取得
            // チェックボックスのようなHTML要素を取り扱う場合、
            // アプリケーションが「実際」に受け取る値は文字列です。
            // たとえば、"true"とか"on"です。
            // これらの値を論理値で受け取れると便利なため、booleanメソッドが用意されています。
            // booleanメソッドは1、"1"、true、"true"、"on"、"yes"には、trueを返します。それ以外の場合は、すべてfalseを返します。
            $archived = $request->boolean('archived');

            // 入力データの一部取得
            // only メソッドは要求したキー／値ペアを全部返しますが、リクエストに存在しない場合は、キー／値ペアを返しません。
            $input = $request->only(['username', 'password']);
            $input = $request->only('username', 'password');
            $input = $request->except(['credit_card']);
            $input = $request->except('credit_card');

            // 入力値の存在チェック
            if ($request->has('name')) {
                //
                // dd($request->has('name'));
            }

            // 配列を指定した場合、hasメソッドは指定値がすべて存在するかを判定します。
            if ($request->has(['name', 'email'])) {
                //dd($request->has(['name', 'email']);
            }

            // hasAnyメソッドは、指定した値が存在している場合にtrueを返します。
            if ($request->hasAny(['name', 'email'])) {
                // dd($request->hasAny(['name', 'email']));
            }

            // 値がリクエストに存在しており、かつ空でないことを判定したい場合は、filledメソッドを使います。
            if ($request->filled('name')) {
                //
                // dd($request->filled('name'));
            }

            // 指定したキーがリクエストに存在していないことを判定する場合は、missingメソッドを使います。
            if ($request->missing('name')) {
                //
                // dd($request->missing('name'));
            }

            // セッションへ保存
            $session = $request->flash();
            // dd($session);

            // dd($request);
            $session = $request->flashOnly(['username', 'email']);

            $session = $request->flashExcept('password');
            // dd($session);

            // request
            // $request = $request->all();
            // return redirect('post')->withInput();



            // セッションへ入力の一部をフラッシュデータとして保存するには、flashOnlyとflashExceptが使用できます。
            // 両メソッドは、パスワードなどの機密情報をセッションへ含めないために便利です。
            // return redirect('path')->withInput(
            //     $request->except('password')
            // );
            $value = $request->cookie('name');

            $value = Cookie::get();
            // dd($value);

            // return response('Hello World')->cookie(
            //     'name', 'value', $minutes
            // );

            // fileの取得
            $file = $request->photo;
            // dd($file);

            // ファイルがあるかどうか
            if ($request->hasFile('photo')) {
                return 'hoge';
            }

            //　ファイルが存在しているかに付け加え、isValidメソッドで問題なくアップロードできたのかを確認
            // if ($request->photo->isValid()) {
            //     return 'hoge';
            // }

            //　パスの確認
            // $path = $request->photo->path();

            // extensionメソッドは、ファイルのコンテンツを元に拡張子を推測
            // $extension = $request->photo->extension();
            // dd($extension);

            $path = $request->file();
            dd($path);

            $file = $request->photo;

            // $path = $request->photo->storeAs('photo', 'filename.jpg');

            // s3へ保存
            // $path = $request->photo->storeAs('photo', 'filename.jpg', 's3');



            return view('path_confirm');
        }
    }

}

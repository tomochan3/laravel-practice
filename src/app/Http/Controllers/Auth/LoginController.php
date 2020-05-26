<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Laravelの認証サービスにはAuthファサードでアクセスできます。
// クラスの最初でAuthファサードを確実にインポート
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * 認証を処理する
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        /*
        * attemptメソッドは最初の引数として、キー／値ペアの配列を受け取ります。配列中の他の値は、
        * データベーステーブルの中からそのユーザーを見つけるために使用されます。
        * そのため、以下の例ではemailカラム値によりユーザーが取得されます。
        */

        // onlyメソッドは、要求したキー／値ペアをすべて返します。しかし、リクエスト中に存在しなかった場合、キー／値ペアは返ってきません。
        $credentials = $request->only('email', 'password');

        // attemptメソッドは、認証が成功すればtrueを返します。失敗時はfalseを返します。
        if (Auth::attempt($credentials)) {

        // 追加条件バージョン
        // if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {

        // ガードインスタンスへのアクセス
        // if (Auth::guard('admin')->attempt($credentials)) {

        //　継続ログイン 認証をログインしない限り永続的にログインさせる(logincontrollerにはその機能がすでに入ってる)
        // if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
        //     // このメンバーは継続ログインされる
            // 永続ログインされている時にユーザーが"remember me"クッキーを使用して認証されているかを判定するには、viaRememberメソッドを使用
            // if (Auth::viaRemember()) {
            //     //
            // }
        // }

        // すでに存在しているユーザーインスタンスでアプリケーションにログインさせる必要があれば、
        // loginメソッドにそのユーザーインスタンスを指定し呼び出してください
        // 指定されたオブジェクトはIlluminate\Contracts\Auth\Authenticatable契約を実装している必要があります。
        // Laravelが用意しているApp\Userモデルはこのインターフェイスを実装しています。
        // Auth::login($user);

        // 使用したいガードインスタンスを指定することもできます。
        // Auth::guard('admin')->login($user);

        // IDによる認証
        // ユーザーをアプリケーションへIDによりログインさせる場合は、loginUsingIdメソッドを使います。
        // このメソッドは認証させたいユーザーの主キーを引数に受け取ります。
        // Auth::loginUsingId(1);

        // // 指定したユーザーでログインし、"remember"にする
        // Auth::loginUsingId(1, true);

        // ユーザーを一度だけ認証する
        // onceメソッドを使用すると、アプリケーションにユーザーをそのリクエストの間だけログインさせることができます。
        // セッションもクッキーも使用しないため、ステートレスなAPIを構築する場合に便利です。
        // if (Auth::once($credentials)) {
        //     //
        // }
            /*
            * ユーザーは存在しており、かつアクティブで、資格停止されていない
            * リダイレクタのintendedメソッドは、認証フィルターで引っかかる前にアクセスしようとしていたURLへ、
            * ユーザーをリダイレクトしてくれます。そのリダイレクトが不可能な場合の移動先として、
            * フォールバックURIをこのメソッドに指定してください。
            */
            return redirect()->intended('dashboard');

        }
        // logoutする
        Auth::logout();
    }
}

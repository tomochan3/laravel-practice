<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
//パスワードブローカー(複数のユーザーテーブルに対するパスワードをリセットするために使用する、別々のパスワード「ブローカー」)のカスタマイズ
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    | ユーザーパスワードのリセットロジックを含んでいます。
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     * リセットされた後に指定するrouteの指定
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * パスワードリセットの間、使用されるガードの取得
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('guard-name');
    }

    /**
    * パスワードリセットに使われるブローカの取得
    *
    * @return PasswordBroker
    */
    public function broker()
    {
        return Password::broker('name');
    }
    
}

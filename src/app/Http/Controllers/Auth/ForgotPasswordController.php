<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    | Laravelはパスワードリセットリンクのメールを送信し、ユーザーのパスワードをリセットするために必要なロジックを全部含んでいる、
    | Auth\ForgotPasswordController
    | パスワードがリセットされたら、そのユーザーは自動的にアプリケーションにログインされ、/homeへリダイレクトされます。
    | パスワードリセット後のリダイレクト先をカスタマイズするには、ResetPasswordControllerのredirectToプロパティを定義してください。
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}

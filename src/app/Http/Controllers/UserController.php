<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class UserController extends Controller
{
    /**
     * ユーザーの秘密のメッセージを保存
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function storeSecret(Request $request, $id)
    {
        //　シリアライズ暗号化／復号したい場合
        // $encrypted = Crypt::encryptString('Hello world.');
        // $decrypted = Crypt::decryptString($encrypted);


        // $user = User::findOrFail($id);

        // $user->fill([
        //     'secret' => encrypt($request->secret),
        // ])->save();

        // 値を復号
        try {
            $decrypted = decrypt($encryptedValue);
        } catch (DecryptException $e) {
            //
        }
    }
}

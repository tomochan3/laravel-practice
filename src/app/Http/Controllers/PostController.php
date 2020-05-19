<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * 新ブログポスト作成フォームの表示
     *
     * @return Response
     */
    public function create()
    {
        return view('form');
    }

    /**
     * 新ブログポストの保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'email' => 'required|unique:posts|max:255',
        //     'body' => 'required',
        // ]);

        // バリデーションに成功すれば通常通りcontrollerが実行
        // $validatedData = $request->validate([
        //     'email' => ['required', 'unique:users', 'max:5'],
        //     'address' => ['required'],
        // ]);

        // // 元々バリデーションが定義されている
        // $validator = $request->validateWithBag('blog', [
        //     'email' => ['required', 'unique:users', 'max:2'],
        //     'address' => ['required'],
        // ]);
        // return redirect('form')
        //     ->withErrors($validator, 'blog');


        // // 最初のバリデーションで失敗したら、そのバリデーションで止める bail
        // $request->validate([
        //     'email' => 'bail|required|unique:users|max:2',
        //     'address' => 'required',
        // ]);

        // // ネストした属性の注意点
        // // HTTPリクエストに「ネスト」したパラメーターが含まれている場合、バリデーションルールは「ドット」記法により指定します。
        // $request->validate([
        //     'email' => 'required|unique:users|max:2',
        //     'address' => 'required',
        //     'author.description' => 'required',
        // ]);

        // オプションフィールドに対する注意
        // $request->validate([
        //     'title' => 'required|unique:users|max:255',
        //     'body' => 'required',
        //     'publish_at' => 'nullable|date',
        // ]);

        // バリデータインスタンスの生成
        // $validator = Validator::make($request->all(), [
        //     'title' => 'required|unique:users|max:255',
        //     'body' => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return redirect('post/create')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

        //　自動リダイレクト
        // Validator::make($request->all(), [
        //     'title' => 'required|unique:users|max:255',
        //     'body' => 'required',
        // ])->validate();

        $errors = $validator->errors();

        echo $errors->first('email');

        // ブログポストの保存処理…

        return view('confirm');
        // ブログポストは有効
    }
}

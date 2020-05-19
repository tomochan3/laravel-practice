<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBlogPost;

class ValidateConfirmController extends Controller
{
    /**
     * ブログポストの保存
     *
     * @param  StoreBlogPost  $request
     * @return Response
     */
    public function create(Request $request)
    {
        return view('validate_form');
    }

    /**
     * 新ブログポストの保存
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(StoreBlogPost $request)
    {
        // バリデーション済みデータの取得
        $validated = $request->validated();
    }
}

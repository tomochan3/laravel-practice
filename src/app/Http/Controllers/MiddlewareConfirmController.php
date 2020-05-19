<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiddlewareConfirmController extends Controller
{
    // middelware学習用
    public function index()
    {
        return view('middlewareInput');
    }
    // middlewareでageが200以下
    public function confirm()
    {
        return view('middlewareConfirm');
    }
    // middlewareでageが200以上
    public function redirect()
    {
        return view('middlewareRedirect');
    }

    public function parameter()
    {
        return view('middlewareParameter');
    }
}

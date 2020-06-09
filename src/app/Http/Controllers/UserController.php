<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $user = App\User::find(1);
        $firstName = $user->first_name;

        $user = App\User::find(1);

        $user->first_name = 'Sally';

        $user = App\User::find(1);

        $user->deleted_at = now();

        $user->save();

        $user = App\User::find(1);

        $user = App\User::find(1);

        if ($user->is_admin) {
            echo('hoge');
        }

        $user = App\User::find(1);

        $options = $user->options;

        $options['key'] = 'value';

        $user->options = $options;

        $user->save();


        return $user->deleted_at->getTimestamp();
    }

    /**
     * ユーザーのフルネーム取得
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

}

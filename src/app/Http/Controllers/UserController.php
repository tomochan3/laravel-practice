<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function index() {
        // $users = App\User::where('active', 1)->get();

        // foreach ($users as $user) {
        //     echo $user->name;
        // }

        // // コレクションは配列よりもパワフルで直感的なインターフェイスを使ったメソッドチェーンにより、マッピングや要素の省略操作を行うことができます。
        // // 例としてアクティブでないモデルを削除し、残ったユーザーのファーストネームを集める
        // $users = App\User::all();

        // $names = $users->reject(function ($user) {
        //     return $user->active === false;
        // })
        // ->map(function ($user) {
        //     return $user->name;
        // });

        $users = App\User::all();
        // containsメソッドは、指定したモデルインスタンスがコレクションに含まれるかを判定します。
        // このメソッドは主キーかモデルインスタンスを引数に取ります。
        $users->contains(1);

        $users->contains(User::find(1));

        $users = App\User::all();
        // diffメソッドは、指定したコレクション中に存在しないモデルをすべて返します。
        $users = $users->diff(User::whereIn('id', [1, 2, 3])->get());

        $users = App\User::all();
        // exceptメソッドは、指定した主キーを持たないモデルをすべて返します。
        $users = $users->except([1, 2, 3]);

        // findメソッドは、指定した主キーのモデルを見つけます。$keyがモデルインスタンスの場合、findはその主キーと一致するモデルを返そうとします。
        // $keyがキーの配列の場合はwhereIn()を使用して、$keyと一致するモデルをすべて返します。
        $users = User::all();

        $user = $users->find(1);

        $users = App\User::all();
        // freshメソッドは、コレクション中の各モデルのインスタンスをデータベースから取得します。
        // さらに、指定されたリレーションをEagerロードします。
        $users = $users->fresh();

        $users = App\User::all();
        //intersectメソッドは指定したコレクション中にも存在する、すべてのモデルを返します
        $users = $users->fresh('comments');

        $users = App\User::all();
        // intersectメソッドは指定したコレクション中にも存在する、すべてのモデルを返します
        $users = $users->intersect(User::whereIn('id', [1, 2, 3])->get());

        $users = App\User::all();
        // loadメソッドは指定したリレーションをコレクションの全モデルに対してEagerロードします。
        $users->load('comments', 'posts');

        $users = App\User::all();
        // modelKeysメソッドは、コレクションの全モデルの主キーを返します。
        $users->load('comments.author');

        $users->modelKeys();

        $users = $users->makeVisible(['address', 'phone_number']);

        // makeHiddenメソッドはコレクション中の各モデルの、通常「可視化(Visible)されている」属性を可視化隠し(hidden)ます。
        $users = App\User::all();
        $users = $users->makeHidden(['address', 'phone_number']);

        // onlyメソッドは、指定した主キーを持つモデルを全部返します。
        $users = App\User::all();
        $users = $users->only([1, 2, 3]);

        // uniqueメソッドは、コレクション中のユニークなモデルをすべて返します。
        // コレクション中の同じタイプで同じ主キーを持つモデルは削除されます。
        $users = App\User::all();
        $users = $users->unique();


    }

}

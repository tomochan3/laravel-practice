<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index() {
        // database.phpに書いてあるconnectionを指定すると、切り分けることが可能
        // $users = DB::connection('foo')->select(...);

        // 裏で動作しているPDOインスタンスに直接アクセスしたい場合は、接続インスタンスにgetPdoメソッドを使います。
        // $pdo = DB::connection()->getPdo();

        // ２つ目の引数はクエリに結合する必要のあるパラメーター
        // $users = DB::select('select * from users where active = ?', [1]);

        // // パラメーター結合に?を使う代わりに名前付きの結合でクエリを実行できます。
        // $results = DB::select('select * from users where id = :id', ['id' => 1]);

        // // insert文の実行
        // // insert文を実行するには、DBファサードのinsertメソッドを使います。selectと同様に、このメソッドは第１引数にSQLクエリそのもの、第２引数に結合を取ります。
        // DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);

        // // データベースの既存レコードの更新には、updateメソッドを使います。
        // $affected = DB::update('update users set votes = 100 where name = ?', ['John']);

        // // delete文の実行
        // $deleted = DB::delete('delete from users');

        // // 通常のSQL文を実行 いつくかのデータベース文は値を返しません。こうしたタイプの操作には、DBファサードのstatementメソッドを使います。
        // DB::statement('drop table users');

        // foreach ($users as $user) {
        //     echo $user->name;
        // }

        // データベーストランザクション
        // DB::transaction(function () {
        //     DB::table('users')->update(['votes' => 1]);

        //     DB::table('posts')->delete();
        // });

        // デッドロック発生時のトランザクション再試行回数
        // DB::transaction(function () {
        //     DB::table('users')->update(['votes' => 1]);

        //     DB::table('posts')->delete();
        // }, 5);

        // 手動トランザクション
        // DB::beginTransaction();

        // rollbackメソッドによって手動でロールバックする
        // DB::rollBack();

        // // 手動コミット
        // DB::commit();

        // return view('user.index', ['users' => $users]);
    }
}

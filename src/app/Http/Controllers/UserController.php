<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * アプリケーションの全ユーザーレコード一覧を表示
     *
     * @return Response
     */
    public function index()
    {
        // getはIlluminate\Support\Collectionを返す
        $users = DB::table('users')->get();

        // dd($users);
        // // 1件取得
        // $user = DB::table('users')->where('name', 'John')->first();

        // 全カラムは必要ない場合、valueメソッドにより一つの値のみ取得
        // $email = DB::table('users')->where('name', 'John')->value('email');
        // dd($email);

        // idカラム値により１行取得する場合
        // $user = DB::table('users')->find(1);
        // dd($user);

        // 単一カラムの値をコレクションで取得したい場合
        // $titles = DB::table('users')->pluck('name');
        // dd($titles);

        // 取得コレクションのキーカラムを指定することもできます。
        $roles = DB::table('users')->pluck('id', 'name');
        // dd($roles);

        // 多量のデータの取得chunk
        // DB::table('users')->orderBy('id')->chunk(100, function ($users) {
        //     foreach ($users as $user) {
        //         //
        //     }
        // });
        // // クロージャからfalseを返すとチャンクの処理を中断できます。
        // DB::table('users')->orderBy('id')->chunk(100, function ($users) {
        //     // レコードの処理…

        //     return false;
        // });

        // 結果をチャンクしつつデータベースレコードを更新すると、チャンク結果が意図しない変化を起こす可能性があります。
        // そのため、チャンク結果を更新する場合は、メソッドを使用するのが最善です。
        // このメソッドは自動的にレコードの主キーに基づいて結果を自動的にページ割りします。
        // DB::table('users')->where('active', false)
        //     ->chunkById(100, function ($users) {
        //         foreach ($users as $user) {
        //             DB::table('users')
        //                 ->where('id', $user->id)
        //                 ->update(['active' => true]);
        //         }
        //     });

        // 集計
        $users = DB::table('users')->count();
        $price = DB::table('users')->max('id');
        // 他の節と組み合わせて使用できます。
        // $price = DB::table('users')
        //         ->where('id', 1)
        //         ->avg('id');

        // クエリの制約にマッチするレコードが存在するかを調べるため、
        // countメソッドを使用する代わりに、existsやdoesntExistメソッドを使うこともできます。
        // $id = DB::table('users')->where('id', 1)->exists(); // trueが返る
        // $id = DB::table('users')->where('id', 1)->doesntExist(); // falseが返る

        // select節の指定のカラムだけ取得
        // $users = DB::table('users')->select('name', 'email as user_email')->get();

        // distinctメソッドで重複行をまとめた結果を返すように強制できます。
        // $users = DB::table('users')->distinct()->get();

        // すでにクエリビルダインスタンスがあり、select節にカラムを追加したい場合はaddSelectメソッドを使ってください。
        // $query = DB::table('users')->select('name');
        // $users = $query->addSelect('id')->get();


        // 直接SQL文を書く時のDB::rawメソッド
        // $users = DB::table('users')
        //              ->select(DB::raw('count(*) as user_count, id'))
        //              ->get();

        // selectRaw DB::rawの短縮 第２引数へバインド値の配列を指定することも可能です。
        // $orders = DB::table('users')
        //         ->selectRaw('id * ? as price_with_tax', [1.0825])
        //         ->get();
        // dd($orders);

        // whereRaw / orWhereRaw
        // $orders = DB::table('orders')
        //         ->whereRaw('price > IF(state = "TX", ?, 100)', [200])
        //         ->get();

        // havingRaw / orHavingRaw havingRawとorHavingRawメソッドは、文字列をhaving節の値として指定する
        // $orders = DB::table('orders')
        //         ->select('department', DB::raw('SUM(price) as total_sales'))
        //         ->groupBy('department')
        //         ->havingRaw('SUM(price) > ?', [2500])
        //         ->get();

        // orderByRawメソッドは、文字列をorder by節の値として指定するために使用します。
        // $orders = DB::table('orders')
        //                 ->orderByRaw('updated_at - created_at DESC')
        //                 ->get();

        // groupByRaw
        // $orders = DB::table('orders')
        //         ->select('city', 'state')
        //         ->groupByRaw('city, state')
        //         ->get();

        // $users = DB::table('users')
        //     ->join('contacts', 'users.id', '=', 'contacts.id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();

        // $users = DB::table('users')
        //     ->leftJoin('posts', 'users.id', '=', 'posts.user_id')
        //     ->get();

        // $users = DB::table('users')
        //             ->rightJoin('posts', 'users.id', '=', 'posts.user_id')
        //             ->get();

        // $users = DB::table('sizes')
        //     ->crossJoin('colors')
        //     ->get();

        // 上級のJOIN文
        // DB::table('users')
        // ->join('contacts', function ($join) {
        //     $join->on('users.id', '=', 'contacts.user_id')->orOn(...);
        // })
        // ->get();

        // DB::table('users')
        // ->join('contacts', function ($join) {
        //     $join->on('users.id', '=', 'contacts.user_id')
        //          ->where('contacts.user_id', '>', 5);
        // })
        // ->get();

        // サブクエリ
        // $latestPosts = DB::table('posts')
        //            ->select('user_id', DB::raw('MAX(created_at) as last_post_created_at'))
        //            ->where('is_published', true)
        //            ->groupBy('user_id');

        // $users = DB::table('users')
        //         ->joinSub($latestPosts, 'latest_posts', function ($join) {
        //             $join->on('users.id', '=', 'latest_posts.user_id');
        //         })->get();

        // Union
        // $first = DB::table('users')
        //     ->whereNull('first_name');

        // $users = DB::table('users')
        //             ->whereNull('last_name')
        //             ->union($first)
        //             ->get();

        // 単純なWHERE節
        // $users = DB::table('users')->where('votes', '=', 100)->get();

        // $users = DB::table('users')->where('votes', 100)->get();

        // 単純なwhhere
        // $users = DB::table('users')
        //         ->where('votes', '>=', 100)
        //         ->get();

        // $users = DB::table('users')
        //                 ->where('votes', '<>', 100)
        //                 ->get();

        // $users = DB::table('users')
        //                 ->where('name', 'like', 'T%')
        //                 ->get();

        // whereに配列で条件を渡すこともできます。
        // $users = DB::table('users')->where([
        //     ['status', '=', '1'],
        //     ['subscribed', '<>', '1'],
        // ])->get();

        // // OR節
        // $users = DB::table('users')
        //             ->where('votes', '>', 100)
        //             ->orWhere('name', 'John')
        //             ->get();

        // $users = DB::table('users')
        //     ->where('votes', '>', 100)
        //     ->orWhere(function($query) {
        //         $query->where('name', 'Abigail')
        //               ->where('votes', '>', 50);
        //     })
        //     ->get();

        // whereBetweenメソッドはカラムの値が２つの値の間である条件を加えます。
        // $users = DB::table('users')
        //    ->whereBetween('votes', [1, 100])
        //    ->get();

        // whereNotBetweenメソッドは、カラムの値が２つの値の間ではない条件を加えます。
        // $users = DB::table('users')
        //             ->whereNotBetween('votes', [1, 100])
        //             ->get();

        // whereInメソッドは指定した配列の中にカラムの値が含まれている条件を加えます。
        // whereIn / whereNotIn / orWhereIn / orWhereNotIn
        // $users = DB::table('users')
        //             ->whereIn('id', [1, 2, 3])
        //             ->get();

        // whereNotInメソッドはカラムの値が指定した配列の中に含まれていない条件を加えます。
        // $users = DB::table('users')
        //             ->whereNotIn('id', [1, 2, 3])
        //             ->get();

        // whereNull / whereNotNull / orWhereNull / orWhereNotNull
        // whereNullメソッドは指定したカラムの値がNULLである条件を加えます。

        // $users = DB::table('users')
        //                     ->whereNull('updated_at')
        //                     ->get();
        // whereNotNullメソッドは指定したカラムの値がNULLでない条件を加えます。

        // $users = DB::table('users')
        //                     ->whereNotNull('updated_at')
        //                     ->get();
        // whereDate / whereMonth / whereDay / whereYear / whereTime

        // whereDateメソッドはカラム値を日付と比較する時に使用します。

        // $users = DB::table('users')
        //                 ->whereDate('created_at', '2016-12-31')
        //                 ->get();
        // whereMonthメソッドはカラム値と、ある年の指定した月とを比較します。

        // $users = DB::table('users')
        //                 ->whereMonth('created_at', '12')
        //                 ->get();
        // whereDayメソッドはカラム値と、ある月の指定した日とを比べます。

        // $users = DB::table('users')
        //                 ->whereDay('created_at', '31')
        //                 ->get();
        // whereYearメソッドはカラム値と、指定した年とを比べます。

        // $users = DB::table('users')
        //                 ->whereYear('created_at', '2016')
        //                 ->get();
        // whereTimeメソッドはカラム値と、指定した時間を比較します。

        // $users = DB::table('users')
        //                 ->whereTime('created_at', '=', '11:20:45')
        //                 ->get();
        // whereColumn / orWhereColumn

        // whereColumnメソッドは２つのカラムが同値である確認をするのに使います。

        // $users = DB::table('users')
        //                 ->whereColumn('first_name', 'last_name')
        //                 ->get();
        // メソッドに比較演算子を追加指定することもできます。

        // $users = DB::table('users')
        //                 ->whereColumn('updated_at', '>', 'created_at')
        //                 ->get();
        // whereColumnへ配列により複数の条件を渡すこともできます。各条件はandオペレータでつなげられます。

        // $users = DB::table('users')
        //                 ->whereColumn([
        //                     ['first_name', '=', 'last_name'],
        //                     ['updated_at', '>', 'created_at'],
        //                 ])->get();

        // select * from users where name = 'John' and (votes > 100 or title = 'Admin')
        // ↓↓↓↓↓↓↓
        // $users = DB::table('users')
        //    ->where('name', '=', 'John')
        //    ->where(function ($query) {
        //        $query->where('votes', '>', 100)
        //              ->orWhere('title', '=', 'Admin');
        //    })
        //    ->get();


        // select * from users
        // where exists (
        //     select 1 from orders where orders.user_id = users.id
        // )
        // $users = DB::table('users')
        //    ->whereExists(function ($query) {
        //        $query->select(DB::raw(1))
        //              ->from('orders')
        //              ->whereRaw('orders.user_id = users.id');
        //    })
        //    ->get();

        // orderBy
        // $users = DB::table('users')
        //         ->orderBy('name', 'desc')
        //         ->get();

        // latest／oldest latestとoldestメソッドにより、データの結果を簡単に整列できます。
        // デフォルトで、結果はcreated_atカラムによりソートされます。ソートキーとしてカラム名を渡すこともできます。
        // $user = DB::table('users')
        //         ->latest()
        //         ->first();

        // inRandomOrder
        // inRandomOrderメソッドはクエリ結果をランダム順にする場合で使用します。たとえば、以下のコードはランダムにユーザーを一人取得します。
        // $randomUser = DB::table('users')
        //         ->inRandomOrder()
        //         ->first();

        // groupBy / having
        // groupByとhavingメソッドはクエリ結果をグループへまとめるために使用します。havingメソッドはwhereメソッドと似た使い方です。

        // $users = DB::table('users')
        //                 ->groupBy('account_id')
        //                 ->having('account_id', '>', 100)
        //                 ->get();
        // // 複数カラムによるグループ化のため、groupByメソッドに複数の引数を指定できます。

        // $users = DB::table('users')
        //                 ->groupBy('first_name', 'status')
        //                 ->having('account_id', '>', 100)
        //                 ->get();
        // // より上級なhaving文については、havingRawメソッドを参照してください。

        // // skip / take
        // // クエリから限られた(LIMIT)数のレコードを受け取ったり、結果から指定した件数を飛ばしたりするには、skipとtakeメソッドを使います。

        // $users = DB::table('users')->skip(10)->take(5)->get();
        // // 別の方法として、limitとoffsetメソッドも使用できます。

        // $users = DB::table('users')
        //                 ->offset(10)
        //                 ->limit(5)
        //                 ->get();

        // 条件節
        // ある条件がtrueの場合の時のみ、クエリへ特定の文を適用したい場合があります。たとえば特定の入力値がリクエストに含まれている場合に、where文を適用する場合です。whenメソッドで実現できます。

        // $role = $request->input('role');

        // $users = DB::table('users')
        //                 ->when($role, function ($query, $role) {
        //                     return $query->where('role_id', $role);
        //                 })
        //                 ->get();
        // whenメソッドは、第１引数がtrueの時のみ、指定されたクロージャを実行します。最初の引数がfalseの場合、クロージャを実行しません。

        // whenメソッドの第3引数に別のクロージャを渡せます。このクロージャは、最初の引数の評価がfalseであると実行されます。この機能をどう使うかを確認するため、クエリのデフォルトソートを設定してみましょう。

        // $sortBy = null;

        // $users = DB::table('users')
        //                 ->when($sortBy, function ($query, $sortBy) {
        //                     return $query->orderBy($sortBy);
        //                 }, function ($query) {
        //                     return $query->orderBy('name');
        //                 })
        //                 ->get();

        // INSERT
        // クエリビルダは、データベーステーブルにレコードを挿入するためのinsertメソッドを提供しています。insertメソッドは挿入するカラム名と値の配列を引数に取ります。

        // DB::table('users')->insert(
        //     ['email' => 'john@example.com', 'votes' => 0]
        // );
        // 配列の配列をinsertに渡して呼び出すことで、テーブルにたくさんのレコードを一度にまとめて挿入できます。

        // DB::table('users')->insert([
        //     ['email' => 'taylor@example.com', 'votes' => 0],
        //     ['email' => 'dayle@example.com', 'votes' => 0]
        // ]);
        // insertOrIgnoreメソッドは、データベースにレコードを挿入する際、重複レコードエラーを無視します。

        // DB::table('users')->insertOrIgnore([
        //     ['id' => 1, 'email' => 'taylor@example.com'],
        //     ['id' => 2, 'email' => 'dayle@example.com']
        // ]);
        // 自動増分ID
        // テーブルが自動増分IDを持っている場合、insertGetIdメソッドを使うとレコードを挿入し、そのレコードのIDを返してくれます。

        // $id = DB::table('users')->insertGetId(
        //     ['email' => 'john@example.com', 'votes' => 0]
        // );
        // Note: PostgreSQLでinsertGetIdメソッドを使う場合、自動増分カラム名はidである必要があります。他の「シーケンス」からIDを取得したい場合は、insertGetIdメソッドの第２引数へカラム名を指定してください。

        // UPDATE
        // データベースへレコードを挿入するだけでなく、存在しているレコードをupdateメソッドで更新することもできます。updateメソッドはinsertメソッドと同様に、更新対象のカラムのカラム名と値の配列を引数に受け取ります。更新するクエリをwhere節を使って制約することもできます。

        // $affected = DB::table('users')
        //             ->where('id', 1)
        //             ->update(['votes' => 1]);
        // UPDATEかINSERT
        // データベースへ一致するレコードが存在している場合は更新し、一致するレコードがない場合は新規追加したいことも起きます。このようなシナリオでは、updateOrInsertメソッドが使えます。updateOrInsertメソッドは２つの引数を取ります。見つけようとするレコードの条件の配列と、更新するカラム／値のペアの配列です。

        // updateOrInsertメソッドは最初の引数のカラム／値ペアを使い、一致するデータベースレコードを見つけようとします。レコードが存在していれば、２つ目の引数の値で更新します。レコードが見つからなければ、両引数をマージした結果で新しいレコードを挿入します。

        // DB::table('users')
        //     ->updateOrInsert(
        //         ['email' => 'john@example.com', 'name' => 'John'],
        //         ['votes' => '2']
        //     );
        // JSONカラムの更新
        // JSONカラムを更新する場合は、JSONオブジェクト中の適切なキーへアクセスするために、->記法を使用してください。この操作子は、MySQL5.7以上とPostgreSQL9.5以上でサポートしています。

        // $affected = DB::table('users')
        //             ->where('id', 1)
        //             ->update(['options->enabled' => true]);
        // 増分・減分
        // クエリビルダは指定したカラムの値を増やしたり、減らしたりするのに便利なメソッドも用意しています。これは短縮記法で、update文で書くのに比べるとより記述的であり、簡潔なインターフェイスを提供しています。

        // 両方のメソッドともに、最小１つ、更新したいカラムを引数に取ります。オプションの第２引数はそのカラムの増減値を指定します。

        // DB::table('users')->increment('votes');

        // DB::table('users')->increment('votes', 5);

        // DB::table('users')->decrement('votes');

        // DB::table('users')->decrement('votes', 5);
        // さらに増減操作と一緒に更新する追加のカラムを指定することもできます。

        // DB::table('users')->increment('votes', 1, ['name' => 'John']);
        // DELETE
        // クエリビルダはdeleteメソッドで、テーブルからレコードを削除するためにも使用できます。 deleteメソッドを呼び出す前にwhere節を追加し、delete文を制約することもできます。

        // DB::table('users')->delete();

        // DB::table('users')->where('votes', '>', 100)->delete();
        // 全レコードを削除し、自動増分のIDを0へリセットするためにテーブルをTRUNCATEしたい場合は、truncateメソッドを使います。

        // DB::table('users')->truncate();
        // 悲観的ロック
        // クエリビルダは、SELECT文で「悲観的ロック」を行うための機能をいくつか持っています。SELECT文を実行する間「共有ロック」をかけたい場合は、sharedLockメソッドをクエリに指定してください。共有ロックはトランザクションがコミットされるまで、SELECTしている行が更新されることを防ぎます。

        // DB::table('users')->where('votes', '>', 100)->sharedLock()->get();
        // もしくはlockForUpdateメソッドが使えます。占有ロックをかけることで、レコードを更新したりSELECTするために他の共有ロックが行われるのを防ぎます。

        // DB::table('users')->where('votes', '>', 100)->lockForUpdate()->get();
        // デバッグ
        // クエリを組み立てる時に、クエリの結合とSQLをダンプするために、ddとdumpメソッドが使用できます。ddメソッドはデバッグ情報を出力し、リクエストの実行を中断します。dumpメソッドはデバッグ情報を出力しますが、リクエストは継続して実行されます。

        // DB::table('users')->where('votes', '>', 100)->dd();

        // DB::table('users')->where('votes', '>', 100)->dump();


        return view('user.index', ['users' => $users]);
    }
}

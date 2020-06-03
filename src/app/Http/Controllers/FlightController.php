<?php

namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;


class FlightController extends Controller
{
    //
    public function index() {
        $flights = Flight::all();
        foreach ($flights as $flight) {
            // echo $flight->name;
        }

        $flights = Flight::orderBy('name', 'desc')
               ->take(10)
               ->get();

        // freshメソッドはデータベースからモデルを再取得
        $flight = Flight::where('name', 'Lucy1')->first();

        $freshFlight = $flight->fresh();
        // dd($freshFlight);

        // データベースから取得したばかりのデータを使用し、既存のモデルを再構築します。
        $flight = Flight::where('name', 'Lucy1')->first();

        $flight->number = 'Lucy1';

        $flight->refresh();

        $flight = Flight::get();
        // コレクション Illuminate\Database\Eloquent\Collection インスタンスを返す
        $flights = $flights->reject(function ($flight) {
            return $flight->id;
        });

        $flights = Flight::get();

        foreach ($flights as $flight) {
            $a = $flight->name;
        }


        Flight::chunk(200, function ($flights) {
            foreach ($flights as $flight) {
                $a = [$flight->id];
            }
        });

        // cursorメソッドにより、ひとつだけクエリを実行するカーソルを使用し、データベース全体を繰り返し処理できます。
        // 大量のデータを処理する場合、cursorメソッドを使用すると、大幅にメモリ使用量を減らせるでしょう。
        // cursorはIlluminate\Support\LazyCollectionインスタンスを返します。
        foreach (Flight::where('name', 'Lucy1')->cursor() as $flight) {
            // dd($flight);
        }

        $users = Flight::cursor()->filter(function ($id) {
            return $id->id > 10;
        });

        foreach ($users as $user) {
            echo $user->id;
        }

        // 主キーで指定したモデル取得
        $flight = Flight::find(1);

        // クエリ条件にマッチした最初のモデル取得
        $flight = Flight::where('name', 'Lucy1')->first();

        // クエリ条件にマッチした最初のモデル取得の短縮記法
        $flight = Flight::firstWhere('name', 'Lucy1');
        // dd($flight);

        // 主キーの配列をfindメソッドに渡し、呼び出す
        $flights = Flight::find([1, 2, 3]);

        // firstOrメソッドは見つかった最初の結果を返すか、クエリ結果が見つからなかった場合にはコールバックを実行
        $model = Flight::where('id', '>', 10)->firstOr(function () {
            return new Flight;
        });
        // dd($model);

        // $model = App\Flight::findOrFail(1);

        // $model = App\Flight::where('id', '>', 100)->firstOrFail();

        // Route::get('/api/flights/{id}', function ($id) {
        //     return App\Flight::findOrFail($id);
        // });

        // $count = App\Flight::where('active', 1)->count();

        // $max = App\Flight::where('active', 1)->max('price');
    }

    /**
     * 新しいflightインスタンスの生成
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        // リクエストのバリデート処理…
        // saveが呼び出された時にcreated_atとupdated_atタイムスタンプは自動的に設定されますので、
        // わざわざ設定する必要はありません。
        // $flight = new Flight;

        // $flight->name = $request->name;

        // $flight->save();

        // updated_atタイムスタンプは自動的に更新されますので、値を指定する手間はかかりません。
        // $flight = App\Flight::find(1);

        // $flight->name = 'New Flight Name';

        // $flight->save();


        //
        $user = User::create([
            'first_name' => 'Taylor',
            'last_name' => 'Otwell',
            'title' => 'Developer',
        ]);

        $user->title = 'Painter';

        // isDirtyメソッドはロードされたモデルから属性に変化があったかを判定
        // isCleanメソッドはisDirtyの反対の働きをし、同様に属性をオプショナルな引数として渡すことができます。
        // $user->isDirty(); // true
        // $user->isDirty('title'); // true
        // $user->isDirty('first_name'); // false

        // $user->isClean(); // false
        // $user->isClean('title'); // false
        // $user->isClean('first_name'); // true

        // $user->save();

        // $user->isDirty(); // false
        // $user->isClean(); // true

        // wasChangedメソッドは現在のリクエストサイクル中、最後にモデルが保存されたときから属性に変化があったかを判定します。
        // 特定の属性が変化したかを調べるために、属性名を渡すことも可能です。
        // $user = User::create([
        //     'first_name' => 'Taylor',
        //     'last_name' => 'Otwell',
        //     'title' => 'Developer',
        // ]);

        // $user->title = 'Painter';
        // $user->save();

        // $user->wasChanged(); // true
        // $user->wasChanged('title'); // true
        // $user->wasChanged('first_name'); // false

        // 複数代入する属性を指定したら、新しいレコードをデータベースに挿入するため、createが利用できます。
        // createメソッドは保存したモデルインスタンスを返します。
        // $flight = Flight::create(['name' => 'Flight 10']);

        // すでに存在するモデルインスタンスへ属性を指定したい場合は、fillメソッドを使い、配列で指定してください。
        // $flight->fill(['name' => 'Flight 22']);

        // nameでフライトを取得するか、存在しなければ作成する
        // 指定されたカラム／値ペアでデータベースレコードを見つけようします。
        // モデルがデータベースで見つからない場合は、最初の引数が表す属性、任意の第２引数があればそれが表す属性も同時に含む、
        // レコードが挿入されます。
        $flight = Flight::firstOrCreate(['name' => 'Flight 10']);

        // nameでフライトを取得するか、存在しなければ指定されたname、delayed、arrival_timeを含め、インスタンス化する
        $flight = Flight::firstOrCreate(
            ['name' => 'Flight 10'],
            ['delayed' => 1, 'arrival_time' => '11:30']
        );

        // nameで取得するか、インスタンス化する
        // firstOrNewメソッドもfirstOrCreateのように指定された属性にマッチするデータベースのレコードを見つけようとします。
        // しかしモデルが見つからない場合、新しいモデルインスタンスが返されます。
        $flight = Flight::firstOrNew(['name' => 'Flight 10']);

        // nameで取得するか、name、delayed、arrival_time属性でインスタンス化する
        $flight = Flight::firstOrNew(
            ['name' => 'Flight 10'],
            ['delayed' => 1, 'arrival_time' => '11:30']
        );

        // OaklandからSan Diego行きの飛行機があれば、料金へ９９ドルを設定する。
        // 一致するモデルがなければ、作成する。
        // また、既存のモデルを更新するか、存在しない場合は新しいモデルを作成したい状況も存在します。
        // これを一度に行うため、LaravelではupdateOrCreateメソッドを提供しています。
        // firstOrCreateメソッドと同様に、updateOrCreateもモデルを保存するため、save()を呼び出す必要はありません。
        $flight = Flight::updateOrCreate(
            ['departure' => 'Oakland', 'destination' => 'San Diego'],
            ['price' => 99, 'discounted' => 1]
        );

        // Modelを呼び出して削除
        $flight = Flight::find(1);
        $flight->delete();

        Flight::destroy(1);

        Flight::destroy(1, 2, 3);

        Flight::destroy([1, 2, 3]);

        Flight::destroy(collect([1, 2, 3]));

        // $deletedRows = Flight::where('active', 0)->delete();

        // 指定されたモデルインスタンスがソフトデリートされているかを確認するには、trashedメソッドを使います。
        if ($flight->trashed()) {
            //
        }

        // ソフトデリート済みモデルも含める
        // 前述のようにソフトデリートされたモデルは自動的にクエリの結果から除外されます。
        // しかし結果にソフトデリート済みのモデルを含めるように強制したい場合は、クエリにwithTrashedメソッドを使ってください。
        $flights = Flight::withTrashed()
                ->where('account_id', 1)
                ->get();

        // withTrashedメソッドはリレーションのクエリにも使えます。
        $flight->history()->withTrashed()->get();

        // onlyTrashedメソッドによりソフトデリート済みのモデルのみを取得できます。
        $flights = Flight::onlyTrashed()
            ->where('airline_id', 1)
            ->get();

        // ソフトデリートの解除
        $flight->restore();

        // 複数のモデルを手っ取り早く未削除に戻すため、クエリにrestoreメソッドを使うこともできます。
        // 他の「複数モデル」操作と同様に、この場合も復元されるモデルに対するモデルイベントは、発行されません。
        Flight::withTrashed()
            ->where('airline_id', 1)
            ->restore();

        // withTrashedメソッドと同様、restoreメソッドはリレーションに対しても使用できます。
        $flight->history()->restore();

        // // １モデルを完全に削除する
        // $flight->forceDelete();

        // // 関係するモデルを全部完全に削除する
        // $flight->history()->forceDelete();

        $shipping = App\Address::create([
            'type' => 'shipping',
            'line_1' => '123 Example Street',
            'city' => 'Victorville',
            'state' => 'CA',
            'postcode' => '90001',
        ]);

        $billing = $shipping->replicate()->fill([
            'type' => 'billing'
        ]);

        $billing->save();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use DB;

class UserController extends Controller
{
    /**
     * アプリケーションの全ユーザーリストの表示
     *
     * @return Response
     */
    public function index()
    {
        // cacheを全部取得 アイテムがキャッシュに存在していない場合は、nullが返されます。
        $value = Cache::get('key');

        $value = Cache::get('key', 'default');

        $value = Cache::store('file')->get('foo');

        $value = Cache::get('key', function () {
            return DB::table('users')->get();
        });

        // Cacheファサードのstoreメソッドを使い、さまざまなキャッシュ保存域へアクセスできます
        // Cache::store('redis')->put('bar', 'baz', 600); // 10 Minutes
        //

        // アイテムの存在確認 値がnullの場合、false
        if (Cache::has('key')) {
            //
        }

        //　値の増減
        // incrementとdecrementメソッドはキャッシュの整数アイテムの値を調整するために使用します。
        // 両方のメソッドともそのアイテムの値をどのくらい増減させるかの増分をオプションの第２引数に指定できます。
        $amount = 1;
        Cache::increment('key');
        Cache::increment('key', $amount);
        Cache::decrement('key');
        Cache::decrement('key', $amount);

        // 取得不可時更新
        // キャッシュからアイテムを取得しようとして、指定したアイテムが存在しない場合は、
        // デフォルト値を保存したい場合もあるでしょう。たとえば、全ユーザーをキャッシュから取得しようとし、
        // 存在していない場合はデータベースから取得しキャッシュへ追加したい場合です。Cache::rememberメソッドを使用します。
        // キャッシュに存在しない場合、rememberメソッドに渡された「クロージャ」が実行され、結果がキャッシュに保存されます。
        $seconds = 10;
        $value = Cache::remember('users', $seconds, function () {
            return DB::table('users')->get();
        });

        //
        $value = Cache::rememberForever('users', function () {
            return DB::table('users')->get();
        });

        // cache削除
        $value = Cache::pull('key');

        // Cacheファサードのputメソッドにより、キャッシュにアイテムを保存できます
        $a = Cache::put('key', 'value', $seconds);

        // putメソッドに保存期間を渡さない場合、そのアイテムは無期限に保存されます。
        $b = Cache::put('key', 'value');

        // どのくらいでアイテムが無効になるかを秒数で指定する代わりに、
        // キャッシュされたアイテムの有効期限を示すDateTimeインスタンスを渡すこともできます。
        Cache::put('key', 'value', now()->addMinutes(10));

        // 非存在時保存
        // addメソッドはキャッシュに保存されていない場合のみ、そのアイテムを保存します。
        // キャッシュへ実際にアイテムが追加された場合はtrueが返ってきます。そうでなければfalseが返されます。
        Cache::add('key', 'value', $seconds);

        // アイテムを永遠に保存
        // foreverメソッドはそのアイテムをキャッシュへ永遠に保存します。
        // こうした値は有効期限が切れないため、forgetメソッドを使用し、削除する必要があります。
        Cache::forever('key', 'value');

        // キャッシュからのアイテム削除
        Cache::forget('key');

        Cache::put('key', 'value', 0);

        Cache::put('key', 'value', -5);

        // キャッシュ全体をクリアしたい場合はflushメソッドを使います。
        // flushメソッドは、キャッシュのプレフィックスを考慮せずに、キャッシュから全アイテムを削除します。
        // 他のアプリケーションと共有するキャッシュを削除するときは、利用を熟考してください。
        Cache::flush();


    }
}

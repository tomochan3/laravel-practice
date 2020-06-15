<?php

namespace App\Console\Commands;

use App\DripEmailer;
use App\User;
use Illuminate\Console\Command;

class SendEmails extends Command
{
    /**
     * コンソールコマンドの名前と引数、オプション
     *
     * @var string
     */
    //　任意指定な引数
    // protected $signature = 'email:send {user}';
    // デフォルト値を持つ、任意指定な引数
    // protected $signature = 'email:send {user=foo}';

    /**
     * コンソールコマンドの名前と引数、オプション
     *
     * @var string
     */
    // protected $signature = 'email:send {user} {--queue}';

    /**
     * コンソールコマンドの名前と引数、オプション
     *
     * @var string
     */
    protected $signature = 'email:send {user}';


    /**
     * コンソールコマンドの説明
     * php artisan email:send 1 --queue
     * @var string
     */
    protected $description = 'Send drip e-mails to a user';

    /**
     * 新しいコマンドインスタンスの生成
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * アプリケーションのコマンドを登録
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        $this->load(__DIR__.'/MoreCommands');

        // ...
    }

    /**
     * コンソールコマンドの実行
     *
     * @return mixed
     */
    // public function handle()
    // {
    //     // 単純にユーザーから確認を取りたい場合は、confirmメソッド
    //     if ($this->confirm('Do you wish to continue?'))
    //     {
    //         $name = $this->anticipate('What is your name?', ['Taylor', 'Dayle']);

    //         // $name = $this->choice(
    //         //     'What is your name?',
    //         //     ['Taylor', 'Dayle'],
    //         //     $defaultIndex,
    //         //     $maxAttempts = null,
    //         //     $allowMultipleSelections = false
    //         // );

    //         $userId = $this->argument('user');
    //         // 全引数を「配列」で受け取りたければ、argumentを呼ぶ。
    //         $arguments = $this->arguments();

    //         // 特定オプションの取得
    //         $queueName = $this->option('queue');

    //         // 全オプションの取得
    //         $options = $this->options();

    //         $name = $this->ask('What is your name?');

    //         $password = $this->secret('What is the password?');
    //     }
    // }

    /**
     * コンソールコマンドの実行
     *
     * @return mixed
     */
    // public function handle()
    // {
    //     $this->info('Display this on the screen');
    // }

    /**
     * コンソールコマンドの実行
     *
     * @return mixed
     */
    public function handle()
    {
        // $this->call('email:send', [
        //     'user' => 1, '--queue' => 'default'
        // ]);

        // 他のコンソールコマンドを実行しつつ、出力をすべて無視したい場合
        $this->callSilent('email:send', [
            'user' => 1, '--queue' => 'default'
        ]);
    }
}

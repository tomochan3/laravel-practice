<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //　エラーメッセージ
        $this->error('Something went wrong!');
        // ログに流す
        $this->info('Display this on the screen');
        // ログにプレーンな色を出す
        $this->line('Display this on the screen');

        $headers = ['Name', 'Email'];

        // tableメソッドにより簡単に正しくデータの複数行／カラムをフォーマットできます。
        $users = App\User::all(['name', 'email'])->toArray();

        $this->table($headers, $users);

        $users = App\User::all();

        $bar = $this->output->createProgressBar(count($users));

        // 時間がかかるタスクでは、進捗状況のインディケータを表示できると便利
        // プログレスバーを開始、進行、停止
        $bar->start();

        foreach ($users as $user) {
            $this->performTask($user);

            $bar->advance();
        }

        $bar->finish();
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('phones', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->integer('user_id');
        //     $table->timestamps();
        // });

        // for ($i = 1; $i <= 100; $i++) {
        //     \DB::table('phones')->insert([
        //         'id' => $i,
        //         'user_id' => $i,
        //     ]);
        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
    }
}

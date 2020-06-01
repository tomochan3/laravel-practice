<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Query\Expression;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('movies')->default(new Expression('(JSON_ARRAY())'));
            $table->timestamps();
            // $table->bigIncrements('id');
            // $table->string('name');
            // $table->string('airline');
            // $table->timestamps();
        });

        // // renameする
        // $from = 'flights';
        // $to = 'walks';
        // Schema::rename($from, $to);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}

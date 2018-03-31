<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Trades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('user_id')->unsigned();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('pair')->nullable();
            $table->integer('units')->nullable();
            $table->string('entry')->nullable();
            $table->string('target')->nullable();
            $table->string('stop')->nullable();
            $table->string('exit')->nullable();
            $table->string('realized')->nullable();            
            $table->string('status')->default('open');
            $table->datetime('openDate')->nullable();
            $table->datetime('closeDate')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trades');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Connect', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fights_id')->unique();
            $table->foreign('fights_id')->references('id')->on('fights')->onDelete('cascade');
            $table->unsignedInteger('player_id')->unique();
            $table->foreign('player_id')->references('id')->on('player')->onDelete('cascade');
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
        Schema::dropIfExists('Connect');
    }
}

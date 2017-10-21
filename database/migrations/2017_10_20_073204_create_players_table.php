<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('fights_id')->unsigned();
            $table->integer('fights_id')->references('id')->on('fights')->onDelete('cascade');
            $table->string('cuacuoc');
            $table->integer('sotiencuoc');
            $table->integer('tilecuoc');
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
        Schema::dropIfExists('players');
    }
}

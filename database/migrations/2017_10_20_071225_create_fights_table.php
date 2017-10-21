<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fights', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('players_id');
            $table->string('ten_doi_nha');
            $table->string('ten_doi_khach');
            $table->datetime('time_in');
            $table->datetime('time_out');
            $table->integer('ti_so');
            $table->integer('status');
            $table->integer('doi_nha_thang');
            $table->integer('hoa');
            $table->integer('doi_khach_thang');
            $table->timestamps();
            $table->foreign('players_id')->references('id')->on('players')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fights');
    }
}

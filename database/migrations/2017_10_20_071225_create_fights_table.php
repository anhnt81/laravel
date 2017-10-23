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
            $table->string('ten_doi_nha');
            $table->string('ten_doi_khach');
            $table->datetime('time_in');
            $table->datetime('time_out');
            $table->integer('ti_so');
            $table->integer('status');
            $table->integer('cuoc_doi_nha');
            $table->integer('cuoc_hoa');
            $table->integer('cuoc_doi_khach');
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
        Schema::dropIfExists('fights');
    }
}

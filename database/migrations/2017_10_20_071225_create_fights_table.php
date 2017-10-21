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
            $table->string('tendoinha');
            $table->string('tendoikhach');
            $table->datetime('timein');
            $table->datetime('timeout');
            $table->integer('tiso');
            $table->integer('status');
            $table->integer('doinhathang');
            $table->integer('hoa');
            $table->integer('doikhachthang');
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

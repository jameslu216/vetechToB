<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServeTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serve_time', function (Blueprint $table) {
            $table->integer('clinic_id');
            $table->tinyInteger('day'); //星期幾
            $table->time('open_at');
            $table->time('close_at');
            $table->primary(['clinic_id', 'day']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serve_time');
    }
}

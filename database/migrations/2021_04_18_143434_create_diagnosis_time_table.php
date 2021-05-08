<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosisTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_time', function (Blueprint $table) {
            $table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctor');
            // TODO add week_day and time
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnosis_time');
    }
}

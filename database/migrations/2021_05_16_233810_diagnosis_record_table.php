<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DiagnosisRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_record', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('clinic_id')->unsigned();
            $table->primary(['id', 'clinic_id']);

            $table->string('customer_name');
            $table->integer('customer_id')->unsigned();
            $table->string('phone');
            $table->string('pet_name');
            $table->string('pet_variety')->nullable();
            $table->string('pet_gender')->nullable();
            $table->integer('pet_age')->nullable();
            $table->string('service_type')->nullable();
            $table->string('note')->nullable();
            $table->string('diagnosis_note')->nullable();
            $table->dateTime('datetime');
            $table->integer('doctor_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnosis_record');
    }
}

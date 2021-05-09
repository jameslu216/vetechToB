<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('phone');
            $table->string('pet_name');
            $table->string('pet_variety')->nullable();
            $table->string('pet_gender')->nullable();
            $table->integer('pet_age')->nullable();
            $table->string('serve_type')->nullable();
            $table->string('note')->nullable();
            $table->dateTime('date');
            $table->integer('doctor_id')->nullable();
            $table->integer('clinic_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
}

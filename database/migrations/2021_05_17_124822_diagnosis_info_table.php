<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DiagnosisInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis_info', function (Blueprint $table) {
            $table->integer('doctor_id')->unsigned();
            $table->datetime('datetime');
            $table->string('serve_type');
            $table->primary(['doctor_id', 'datetime']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diagnosis_info');
    }
}

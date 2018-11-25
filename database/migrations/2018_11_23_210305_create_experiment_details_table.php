<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperimentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiment_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->mediumText('objective');
            $table->string('location');
            $table->string('time_taken');
            $table->string('payment');
            $table->mediumText('method_desc');
            $table->longText('poa');
            $table->longText('background');
            $table->dateTime('datetime');
            $table->longText('result')->nullable();
            $table->longText('remark')->nullable();
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
        Schema::dropIfExists('supervisors_and_others');
        Schema::dropIfExists('participants');
        Schema::dropIfExists('experiment_details');
    }
}

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
            $table->integer('experiment_id')->unsigned();
            $table->mediumText('objective');
            $table->string('location');
            $table->string('time_taken');
            $table->string('payment');
            $table->mediumText('method_desc');
            $table->dateTime('datetime');
            $table->timestamps();
            $table->foreign('experiment_id')->references('id')->on('experiment')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiment_details');
    }
}

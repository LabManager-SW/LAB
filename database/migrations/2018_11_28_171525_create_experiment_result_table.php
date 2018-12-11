<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperimentResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiment_result', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('experiment_id')->unsigned();
            $table->integer('participant_id')->unsigned();
            $table->string('file');
            $table->longText('remark');
            $table->timestamps();
        });
        Schema::table('experiment_result', function($table){
            $table->foreign('experiment_id')->references('id')->on('experiment')->onDelete('cascade');
        });
        Schema::table('experiment_result', function($table){
            $table->foreign('participant_id')->references('id')->on('participants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiment_result');
    }
}

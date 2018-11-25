<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupervisorsAndOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors_and_others', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('experiment_id')->unsigned();
            $table->integer('tester_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('supervisors_and_others', function($table){
            $table->foreign('experiment_id')->references('id')->on('experiment_details')->onDelete('cascade');
            $table->foreign('tester_id')->references('id')->on('testers')->onDelete('cascade');
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
    }
}

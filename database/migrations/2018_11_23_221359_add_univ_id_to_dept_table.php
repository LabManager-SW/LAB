<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUnivIdToDeptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dept', function (Blueprint $table) {
            $table->integer('univ_id')->unsigned();

            $table->foreign('univ_id')->references('id')->on('univ')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dept', function (Blueprint $table) {
            $table->dropColumn('univ_id');
        });
    }
}

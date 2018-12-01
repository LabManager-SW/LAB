<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTesterIdToSoaColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('supervisors_and_others', function (Blueprint $table) {
            $table->unsignedInteger('tester_id')->after('experiment_id');
            $table->foreign('tester_id')->references('id')->on('testers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('supervisors_and_others', function (Blueprint $table) {
            $table->dropForeign(['tester_id']);
            $table->dropColumn('tester_id');

        });
    }
}

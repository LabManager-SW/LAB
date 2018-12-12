<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeColumnsToExperimentDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiment_details', function (Blueprint $table) {
            $table->string('name')->after('experiment_id');
            $table->string('poa')->after('name');
            $table->string('background')->after('poa');
            $table->string('tester_name')->after('background');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('experiment_details', function (Blueprint $table) {
           $table->dropColumn(['name', 'poa', 'background', 'tester_name']);
        });
    }
}

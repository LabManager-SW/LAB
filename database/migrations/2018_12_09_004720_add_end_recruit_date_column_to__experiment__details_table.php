<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEndRecruitDateColumnToExperimentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Experiment_Details', function (Blueprint $table) {
            $table->dateTime('end_recruit_date')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Experiment_Details', function (Blueprint $table) {
            $table->dropColumn('end_recruit_date');
        });
    }
}

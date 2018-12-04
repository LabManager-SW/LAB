<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApplicantColumnToExperimentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Experiment_Details', function (Blueprint $table) {
            $table->integer('required_applicant')->after('background');
            $table->integer('applicant')->nullable()->after('required_applicant');
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
            $table->dropColumn('required_applicant');
            $table->dropColumn('applicant');
        });
    }
}

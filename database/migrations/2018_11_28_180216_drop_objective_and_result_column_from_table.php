<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropObjectiveAndResultColumnFromTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('experiment_details', function (Blueprint $table) {
                $table->dropColumn(['objective', 'result']);
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
            $table->string('objective');
            $table->string('result');
        });
    }
}

<?php

use Illuminate\Database\Seeder;

class Experiment_DetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Experiment_Details::truncate();
        factory(\App\Experiment_Details::class,10)->create();
    }
}

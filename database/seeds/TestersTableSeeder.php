<?php

use Illuminate\Database\Seeder;

class TestersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Testers::truncate();
        factory(\App\Testers::class,10)->create();
    }
}

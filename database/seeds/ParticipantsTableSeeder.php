<?php

use Illuminate\Database\Seeder;

class ParticipantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Participants::truncate();
        factory(\App\Participants::class,10)->create();
    }
}

<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();
        factory(\App\User::class,10)->create();
        $user = new \App\User();
        $user->username = 'tester';
        $user->name = 'Test User';
        $user->email = 'user@user.com';
        $user->birth = \Faker\Provider\DateTime::dateTimeThisCentury();
        $user->gender= 'M';
        $user->password = bcrypt('secret');
        $user->phone = '01012345678';
        $user->univ = 'Hanyang Univ.';
        $user->save();
    }
}

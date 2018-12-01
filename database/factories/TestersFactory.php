<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Testers::class, function (Faker $faker) {
    $name=$faker->name;
    return [
        'name' => $name,
        'email' => $name.'@hanyang.ac.kr',
        'phone' => $faker->phoneNumber,
        'dept' => '임상연구실',
        'univ'=> '한양대학교',
    ];
});

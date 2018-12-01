<?php

use Faker\Generator as Faker;

$factory->define(\App\Experiment_Details::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'location' => 'Hanyang Univ. InfoSys Dept',
        'time_taken' => $faker->randomNumber(1).'days '.$faker->randomNumber(1).'hours',
        'payment' => $faker->randomNumber(3)."00won",
        'method_desc' => $faker->realText(10),
        'poa' => $faker->realText(10),
        'background' => $faker->realText(10),
        'datetime' => $faker->date('Y-m-d H:i:s'),
        'health_condition' => 'Non-smoker, Height: Over 165cm ',
    ];
});

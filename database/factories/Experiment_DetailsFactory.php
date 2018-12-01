<?php

use Faker\Generator as Faker;

$factory->define(\App\Experiment_Details::class, function (Faker $faker) {
    $tester_id = \App\Testers::select('id')->get();
    $tester_id_array = array();
    foreach ($tester_id as $id) {
        array_push($tester_id_array, $id->id);
    }
    return [
        'name' => $faker->name,
        'location' => '한양대학교 임상병리학 연구실',
        'time_taken' => $faker->randomNumber(1).'일 '.$faker->randomNumber(1).'시간',
        'payment' => $faker->randomNumber(3)."0원",
        'method_desc' => $faker->realText(10),
        'poa' => $faker->realText(10),
        'background' => $faker->realText(10),
        'datetime' => $faker->date('Y-m-d H'),
        'health_condition' => '비흡연, 키: 165cm 이상 ',
        'tester_id' => $faker->randomElement($tester_id_array),
    ];
});

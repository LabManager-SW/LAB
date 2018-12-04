<?php

use Faker\Generator as Faker;

$factory->define(\App\Participants::class, function (Faker $faker) {
    $users = \App\User::all();
    $rand = random_int(0, 10);
    $user_id = $users[$rand]['id'];
    $user_name = $users[$rand]['name'];
    $experiment_id = \App\Experiment_Details::select('id')->get();
    $experiment_id_array = array();
    $status=array('To be Started', 'In Progress', 'Completed');
    foreach ($experiment_id as $id) {
        array_push($experiment_id_array, $id->id);
    }
    $experiment = $faker->unique()->randomElement($experiment_id_array);
    return [
        'experiment_id' => $experiment,
        'exp_name' => $experiment,
        'user_id' => 11,
        'name' => $user_name,
        'status' => $faker->randomElement($status),
        //
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Answer::class, function (Faker $faker) {
    return [
        'body'        => $faker->paragraph(rand(3, 5), true),
        'user_id'     => \App\User::pluck('id')->random(),
        'question_id' => \App\Question::pluck('id')->random(),
        'votes_cnt'   => rand(-50, 50)
    ];
});

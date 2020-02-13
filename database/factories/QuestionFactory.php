<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title'       => rtrim($faker->sentence(5, 10), '.'),
        'body'        => $faker->paragraph(rand(3, 5), true),
        'views_cnt'   => rand(0, 50),
        'answers_cnt' => rand(0, 50),
        'votes'       => rand(-50, 50),
    ];
});

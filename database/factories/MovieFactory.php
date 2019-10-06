<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Movie;
use Faker\Generator as Faker;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'movie_title' => $faker->name,
        'movie_description' => $faker->paragraph(),
        'movie_release_date' => $faker->dateTime(),
    ];
});

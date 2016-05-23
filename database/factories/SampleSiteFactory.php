<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\Models\SampleSite::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'code' => $faker->unique()->randomNumber(3),
        'x' => $faker->randomFloat(3, -999, 999),
        'y' => $faker->randomFloat(3, -999, 999),
        'station_id' => $faker->numberBetween(1, 50),
    ];
});

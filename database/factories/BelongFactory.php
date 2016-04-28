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

$factory->define(App\Models\Belong::class, function (Faker\Generator $faker) {
    return [
        'station_id' => $faker->numberBetween(1, 500),
        'sample_site_id' => $faker->numberBetween(1, 500),
    ];
});

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

$factory->define(App\Models\MeasurementNetwork::class, function (Faker\Generator $faker) {
    return [
        'uuid' => $faker->uuid,
        'began_at' => $faker->dateTime,
        'end_at' => $faker->dateTime,
    ];
});

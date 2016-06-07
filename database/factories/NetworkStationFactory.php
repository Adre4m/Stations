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

/** @var Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\NetworkStation::class, function (Faker\Generator $faker) {
    return [
        'station_id' => $faker->numberBetween(1, 50),
        'network_id' => $faker->numberBetween(1, 50),
        'began_at' => $faker->date('Y-m-d H:i:s'),
        'end_at' => $faker->date('Y-m-d H:i:s'),
    ];
});

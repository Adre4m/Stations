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
$factory->define(App\Models\Station::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->unique()->randomNumber(),
        'name' => strtoupper($faker->company),
        'x' => $faker->randomFloat(3, -999, 999),
        'y' => $faker->randomFloat(3, -999, 999),
        'manager_id' => $faker->numberBetween(1, 50),
        'owner_id' => $faker->numberBetween(1, 50),
    ];
});

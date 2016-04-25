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

$factory->define(App\Models\Station::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'x' => $faker->randomFloat(3, -200, 200),
        'y' => $faker->randomFloat(3, -200, 200),
        'contributor_id' => App\Models\Contributor::all()->random()->id,
    ];
});

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

$factory->define(App\Models\Contributor::class, function (Faker\Generator $faker) {
    return [
        'uuid' => $faker->unique()->uuid,
        'code' => $faker->unique()->randomNumber(),
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'siret' => $faker->creditCardNumber,
    ];
});

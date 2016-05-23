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

$factory->define(App\Models\Scenario::class, function (Faker\Generator $faker) {
    return [
        'code' => strtoupper($faker->word),
        'version' => $faker->numberBetween(1, 3),
        'name' => $faker->company,
        'began_at' => $faker->date('Y-m-d H:i:s'),
        'end_at' => $faker->date('Y-m-d H:i:s'),
        'transmitter_id' => $faker->numberBetween(1, 50),
        'receiver_id' => $faker->numberBetween(1, 50),
    ];
});

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
        'code' => $faker->unique()->randomNumber(),
        'name' => $faker->company,
        'precise_location' => $faker->address,
        'x' => $faker->randomFloat(3, -999, 999),
        'y' => $faker->randomFloat(3, -999, 999),
        'projection' => $faker->randomNumber(),
        'hardness_class' => $faker->randomNumber(),
        'hydro_entity_code' => $faker->randomNumber(),
        'hydro_section_code' => $faker->randomNumber(),
        'town_code' => $faker->randomNumber(5),
        'manager_id' => $faker->numberBetween(1, 50),
        'owner_id' => $faker->numberBetween(1, 50),
    ];
});

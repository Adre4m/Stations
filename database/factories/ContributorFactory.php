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
$factory->define(App\Models\Contributor::class, function (Faker\Generator $faker) {
    $siret = $faker->boolean;
    return [
        'code' => $faker->unique()->{($siret) ? 'siret' : 'randomNumber'},
        'name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'siret' => $siret,
    ];
});

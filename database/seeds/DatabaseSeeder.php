<?php

use App\Models\Contributor;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for($i = 0; $i < 500; ++$i) {
            $contributor = new Contributor;
            $contributor->name = $faker->firstName;
            $contributor->last_name = $faker->lastName;
            $contributor->save();
            $user = new User;
            $user->name = $faker->name;
            $user->email = $faker->unique()->email;
            $user->password = bcrypt('secret');
            $user->save();
        }
    }
}

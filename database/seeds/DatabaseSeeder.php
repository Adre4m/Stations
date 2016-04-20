<?php

use App\Models\Contributor;
use App\Models\Station;
use App\Models\StationLog;
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

        for($i = 0; $i < 50; ++$i) {
            $station = new Station;
            $station->name = $faker->company;
            $station->x = rand(0, 100);
            $station->y = rand(0, 100);
            $station->id_contributor = rand(1, 500);
            $station->created_at = date_default_timezone_get();
            $station->updated_at = date_default_timezone_get();
            $station->save();
            $log = new StationLog;
            $log->msg = 'Station créée';
            $log->code_station = $station->code;
            $log->created_at = date_default_timezone_get();
            $log->save();
        }
    }
}

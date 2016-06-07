<?php

use App\Models\NetworkStation;
use App\Models\Contributor;
use App\Models\Network;
use App\Models\SampleSite;
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
        factory(User::class, 50)->create();
        factory(Contributor::class, 50)->create();
        factory(Station::class, 50)->create();
        factory(SampleSite::class, 50)->create();
        factory(Network::class, 50)->create();
        factory(NetworkStation::class, 50)->create();
    }
}

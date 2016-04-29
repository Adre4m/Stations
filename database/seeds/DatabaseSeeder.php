<?php

use App\Models\Belong;
use App\Models\Contributor;
use App\Models\MeasurementNetwork;
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
        factory(Station::class, 500)->create();
        foreach (Station::all() as $station)
        {
            $log = new StationLog;
            $log->msg = 'Creation of a new station, code: ' . $station->code ;
            $log->station_id = $station->code;
            $log->save();
        }
        factory(SampleSite::class, 500)->create();
        factory(MeasurementNetwork::class, 500)->create();
        factory(Belong::class, 14)->create();
    }
}

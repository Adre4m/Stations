<?php

use App\Models\Contributor;
use App\Models\Network;
use App\Models\NetworkStation;
use App\Models\SampleSite;
use App\Models\Scenario;
use App\Models\Station;
use App\User;
use Illuminate\Database\Seeder;

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

        $unknown = Contributor::firstOrNew(['code' => '0', 'siret' => false]);
        $unknown->code = 0;
        $unknown->name = 'Intervenant';
        $unknown->last_name = 'Inconnu';
        $unknown->siret = false;
        $unknown->save();

        $geohyd = Contributor::firstOrNew(['code' => '419 713 904 00037', 'siret' => true]);
        $geohyd->code = '419 713 904 00037';
        $geohyd->name = 'GEO';
        $geohyd->last_name = 'HYD';
        $geohyd->siret = true;
        $geohyd->save();

        factory(Station::class, 50)->create();
        factory(SampleSite::class, 50)->create();
        factory(Network::class, 50)->create();
        factory(NetworkStation::class, 50)->create();
        factory(Scenario::class, 50)->create();
    }
}

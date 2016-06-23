<?php

namespace App\Providers;

use App\Models\Contributor;
use App\Models\Network;
use App\Models\NetworkStation;
use App\Models\SampleSite;
use App\Models\Station;
use App\Policies\ContributorPolicy;
use App\Policies\NetworkPolicy;
use App\Policies\NetworkStationPolicy;
use App\Policies\SampleSitePolicy;
use App\Policies\StationPolicy;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Station::class => StationPolicy::class,
        Contributor::class => ContributorPolicy::class,
        SampleSite::class => SampleSitePolicy::class,
        NetworkStation::class => NetworkStationPolicy::class,
        Network::class => NetworkPolicy::class,
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
    }
}

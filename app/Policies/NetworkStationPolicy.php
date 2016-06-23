<?php

namespace App\Policies;

use App\Models\NetworkStation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NetworkStationPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param NetworkStation $station
     * @return bool
     */
    public function destroy(User $user, NetworkStation $station)
    {
        return !auth()->guest();
    }

    /**
     * @param User $user
     * @param NetworkStation $station
     * @return bool
     */
    public function edit(User $user, NetworkStation $station)
    {
        return !auth()->guest();
    }

    /**
     * @param User $user
     * @param NetworkStation $station
     * @return bool
     */
    public function add(User $user, NetworkStation $station)
    {
        return !auth()->guest();
    }
}

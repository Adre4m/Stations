<?php

namespace App\Policies;

use App\Models\Station;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StationPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Station $station
     * @return bool
     */
    public function destroy(User $user, Station $station)
    {
        return !auth()->guest();
    }

    /**
     * @param User $user
     * @param Station $station
     * @return bool
     */
    public function edit(User $user, Station $station)
    {
        return !auth()->guest();
    }

    /**
     * @param User $user
     * @param Station $station
     * @return bool
     */
    public function add(User $user, Station $station)
    {
        return !auth()->guest();
    }
}

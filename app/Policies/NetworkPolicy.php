<?php

namespace App\Policies;

use App\Models\Network;
use App\Models\NetworkStation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NetworkPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Network $station
     * @return bool
     */
    public function destroy(User $user, Network $station)
    {
        return !auth()->guest();
    }

    /**
     * @param User $user
     * @param Network $station
     * @return bool
     */
    public function edit(User $user, Network $station)
    {
        return !auth()->guest();
    }

    /**
     * @param User $user
     * @param Network $station
     * @return bool
     */
    public function add(User $user, Network $station)
    {
        return !auth()->guest();
    }
}

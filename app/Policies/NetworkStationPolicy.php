<?php

namespace App\Policies;

use App\Models\NetworkStation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NetworkStationPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, NetworkStation $station)
    {
        return !auth()->guest();
    }

    public function edit(User $user, NetworkStation $station)
    {
        return !auth()->guest();
    }

    public function add(User $user, NetworkStation $station)
    {
        return !auth()->guest();
    }
}

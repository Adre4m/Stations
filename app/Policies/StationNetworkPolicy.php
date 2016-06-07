<?php

namespace App\Policies;

use App\Models\StationNetwork;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StationNetworkPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, StationNetwork $station)
    {
        return !auth()->guest();
    }

    public function edit(User $user, StationNetwork $station)
    {
        return !auth()->guest();
    }

    public function add(User $user, StationNetwork $station)
    {
        return !auth()->guest();
    }
}

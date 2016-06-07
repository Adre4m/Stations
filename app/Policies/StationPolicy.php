<?php

namespace App\Policies;

use App\Models\Station;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class StationPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Station $station)
    {
        return !auth()->guest();
    }

    public function edit(User $user, Station $station)
    {
        return !auth()->guest();
    }

    public function add(User $user, Station $station)
    {
        return !auth()->guest();
    }
}

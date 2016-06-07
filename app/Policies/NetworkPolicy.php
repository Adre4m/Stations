<?php

namespace App\Policies;

use App\Models\Network;
use App\Models\NetworkStation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NetworkPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Network $station)
    {
        return !auth()->guest();
    }

    public function edit(User $user, Network $station)
    {
        return !auth()->guest();
    }

    public function add(User $user, Network $station)
    {
        return !auth()->guest();
    }
}

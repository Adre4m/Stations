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
        return true;
    }
}

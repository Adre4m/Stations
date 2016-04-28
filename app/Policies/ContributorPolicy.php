<?php

namespace App\Policies;

use App\Models\Contributor;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContributorPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Contributor $contributor)
    {
        return !auth()->guest();
    }

    public function edit(User $user, Contributor $contributor)
    {
        return !auth()->guest();
    }

    public function add(User $user, Contributor $contributor)
    {
        return !auth()->guest();
    }
}

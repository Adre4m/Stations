<?php

namespace App\Policies;

use App\Models\Contributor;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContributorPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Contributor $contributor
     * @return bool
     */
    public function destroy(User $user, Contributor $contributor)
    {
        return !auth()->guest();
    }

    /**
     * @param User $user
     * @param Contributor $contributor
     * @return bool
     */
    public function edit(User $user, Contributor $contributor)
    {
        return !auth()->guest();
    }

    /**
     * @param User $user
     * @param Contributor $contributor
     * @return bool
     */
    public function add(User $user, Contributor $contributor)
    {
        return !auth()->guest();
    }
}

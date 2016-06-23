<?php

namespace App\Policies;

use App\Models\SampleSite;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SampleSitePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param SampleSite $sample_site
     * @return bool
     */
    public function destroy(User $user, SampleSite $sample_site)
    {
        return !auth()->guest();
    }

    /**
     * @param User $user
     * @param SampleSite $sample_site
     * @return bool
     */
    public function edit(User $user, SampleSite $sample_site)
    {
        return !auth()->guest();
    }

    /**
     * @param User $user
     * @param SampleSite $sample_site
     * @return bool
     */
    public function add(User $user, SampleSite $sample_site)
    {
        return !auth()->guest();
    }
}

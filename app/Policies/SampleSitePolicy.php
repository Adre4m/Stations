<?php

namespace App\Policies;

use App\Models\SampleSite;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SampleSitePolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, SampleSite $sample_site)
    {
        return !auth()->guest();
    }

    public function edit(User $user, SampleSite $sample_site)
    {
        return !auth()->guest();
    }

    public function add(User $user, SampleSite $sample_site)
    {
        return !auth()->guest();
    }
}

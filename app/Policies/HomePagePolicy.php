<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HomePagePolicy extends Policies
{
    use HandlesAuthorization;

    /**
     * Permissão ver
     *
     * @param User $user
     * @return bool
     */
    public function view(User $user)
    {
        return parent::viewPolicy($user, 1);
    }
}

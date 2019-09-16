<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrdemNoticiasPolicy extends Policies
{
    use HandlesAuthorization;

    /**
     * Permissão Visualizar
     *
     * @param User $user
     * @return bool
     */
    public function view(User $user)
    {
        return parent::viewPolicy($user, 3);
    }

    /**
     * Permissão criar
     *
     * @param User $user
     * @param $
     * @return void
     */
    public function create(User $user)
    {
        return parent::createPolicy($user, 3);
    }
}

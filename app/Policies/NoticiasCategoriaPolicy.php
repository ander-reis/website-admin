<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NoticiasCategoriaPolicy extends Policies
{
    use HandlesAuthorization;

    /**
     * Permissão criar
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return parent::createPolicy($user, 25);
    }

    /**
     * Permissão alterar
     * @param User $user
     * @return bool
     */
    public function update(User $user)
    {
        return parent::updatePolicy($user, 25);
    }
}

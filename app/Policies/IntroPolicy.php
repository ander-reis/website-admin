<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class IntroPolicy extends Policies
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

    /**
     * Permissão criar
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return parent::createPolicy($user, 1);
    }

    /**
     * Permissão alterar
     *
     * @param User $user
     * @return bool
     */
    public function update(User $user)
    {
        return parent::updatePolicy($user, 1);
    }

    /**
     * Permissao deletar
     *
     * @param User $user
     * @return bool
     */
    public function delete(User $user)
    {
        return parent::deletePolicy($user, 1);
    }
}

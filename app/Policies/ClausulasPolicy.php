<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClausulasPolicy extends Policies
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
        return parent::createPolicy($user, 6);
    }

    /**
     * Permissão alterar
     *
     * @param User $user
     * @return bool
     */
    public function update(User $user)
    {
        return parent::updatePolicy($user, 6);
    }

    /**
     * Permissao deletar
     *
     * @param User $user
     * @return bool
     */
    public function delete(User $user)
    {
        return parent::deletePolicy($user, 6);
    }
}

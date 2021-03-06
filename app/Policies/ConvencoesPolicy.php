<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConvencoesPolicy extends Policies
{
    use HandlesAuthorization;

    /**
     * Permissao ver
     *
     * @param User $user
     * @return bool
     */
    public function view(User $user)
    {
        return parent::viewPolicy($user, 1);
    }

    /**
     * Permissao criar
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        return parent::createPolicy($user, 1);
    }

    /**
     * Permissao alterar
     *
     * @param User $user
     * @return bool
     */
    public function update(User $user)
    {
       return parent::updatePolicy($user, 1);
    }

    /**
     * Permissao excluir
     *
     * @param User $user
     * @return bool
     */
    public function delete(User $user)
    {
       return parent::deletePolicy($user, 21);
    }
}

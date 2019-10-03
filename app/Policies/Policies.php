<?php


namespace App\Policies;


use App\Models\Permissoes;
use App\Models\User;

class Policies
{
    /**
     * @param User $user
     * @param $id_pagina
     * @return bool
     */
    public function viewPolicy(User $user, $id_pagina)
    {
        $permissao = Permissoes::where('id_usuario', $user->id)->where('id_pagina', $id_pagina)->first();
        return (isset($permissao)) ? ($permissao->fl_consulta) ? true : false : false;
    }

    /**
     * @param User $user
     * @param $id_pagina
     * @return bool
     */
    public function createPolicy(User $user, $id_pagina)
    {
        $permissao = Permissoes::where('id_usuario', $user->id)->where('id_pagina', $id_pagina)->first();
        return (isset($permissao)) ? ($permissao->fl_cadastro) ? true : false : false;
    }

    /**
     * @param User $user
     * @param $id_pagina
     * @return bool
     */
    public function updatePolicy(User $user, $id_pagina)
    {
        $permissao = Permissoes::where('id_usuario', $user->id)->where('id_pagina', $id_pagina)->first();
        return (isset($permissao)) ? ($permissao->fl_alteracao) ? true : false : false;
    }

    /**
     * @param User $user
     * @param $id_pagina
     * @return bool
     */
    public function deletePolicy(User $user, $id_pagina)
    {
        $permissao = Permissoes::where('id_usuario', $user->id)->where('id_pagina', $id_pagina)->first();
        return (isset($permissao)) ? ($permissao->fl_exclusao) ? true : false : false;
    }
}

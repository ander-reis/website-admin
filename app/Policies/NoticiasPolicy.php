<?php

namespace App\Policies;

use App\Models\Permissoes;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class NoticiasPolicy
{
    use HandlesAuthorization;


    public function create(User $user)
    {
        $permissao = Permissoes::where('id_usuario', '=', $user->id_usuario)->where('id_pagina', '=', 1)->first();
        return (isset($permissao)) ? ($permissao->fl_cadastro) ? true : false : false;
    }

    public function update(User $user)
    {
        $permissao = Permissoes::where('id_usuario', '=', $user->id_usuario)->where('id_pagina', '=', 1)->first();
        return (isset($permissao)) ? ($permissao->fl_alteracao) ? true : false : false;
    }

    public function view(User $user)
    {
        $permissao = Permissoes::where('id_usuario', '=', $user->id_usuario)->where('id_pagina', '=', 1)->first();
        return (isset($permissao)) ? ($permissao->fl_consulta) ? true : false : false;
    }
}

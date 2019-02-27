<?php

namespace App\Policies;

use App\Models\Permissoes;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConvencoesPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        $permissao = Permissoes::where('id_usuario', '=', $user->id_usuario)->where('id_pagina', '=', 21)->first();
        return (isset($permissao)) ? ($permissao->fl_cadastro) ? true : false : true;
    }

    public function update(User $user)
    {
        $permissao = Permissoes::where('id_usuario', '=', $user->id_usuario)->where('id_pagina', '=', 21)->first();
        return (isset($permissao)) ? ($permissao->fl_alteracao) ? true : false : true;
    }

    public function view(User $user)
    {
        $permissao = Permissoes::where('id_usuario', '=', $user->id_usuario)->where('id_pagina', '=', 21)->first();
        return (isset($permissao)) ? ($permissao->fl_consulta) ? true : false : true;
    }

    public function delete(User $user)
    {
        $permissao = Permissoes::where('id_usuario', '=', $user->id_usuario)->where('id_pagina', '=', 21)->first();
        return (isset($permissao)) ? ($permissao->fl_exclusao) ? true : false : true;
    }
}
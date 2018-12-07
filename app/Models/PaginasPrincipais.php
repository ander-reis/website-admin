<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PaginasPrincipais.
 *
 * @package namespace App\Models;
 */
class PaginasPrincipais extends Model
{
    /**
     * Table
     * @var string
     */
    protected $table =  'tb_sinpro_conteudo_paginas_principais';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tp_busca',
        'txt_titulo_busca',
        'txt_titulo',
        'ds_texto',
        'url_pagina',
        'ds_palavra_chave',
        'fl_status'
    ];

    /**
     * Mutators formata status da página
     *
     * @return string
     */
    public function getFlStatusFormattedAttribute()
    {
        return $this->fl_status ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Oculto</span>';
    }

}

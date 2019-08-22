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
     * Conexão teste Postgre
     */
    protected $connection = 'pgsql';

    protected $table =  'tb_sinpro_conteudo_paginas_principais';

    /**
     * @var string
     */
    protected $primaryKey = 'id_pagina';
    /**
     * configura timestamps
     */
    const CREATED_AT = 'dt_criacao';
    const UPDATED_AT = 'dt_alteracao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tp_busca',
        'txt_titulo_busca',
        'txt_titulo',
        'txt_pagina',
        'url_pagina',
        'ds_palavra_chave',
        'fl_status'
    ];

    protected $hidden = ['dt_alteracao', 'dt_criacao'];

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

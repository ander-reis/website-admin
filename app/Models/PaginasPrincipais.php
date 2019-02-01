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
     * Conexão database website
     */
//    protected $connection = 'sqlsrv-website';
//    protected $table =  'tb_sinpro_conteudo_paginas_principais';

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
     * configura updated_at
     */
    public const UPDATED_AT = 'dt_alteracao';
    /**
     * @var bool
     */
    public $timestamps = false;

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
        'dt_alteracao',
        'fl_status'
    ];

    protected $hidden = ['dt_alteracao'];

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

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
     * table
     *
     * @var string
     */
    protected $table =  'tb_sinpro_conteudo_paginas_principais';

    /**
     * set primary key
     *
     * @var string
     */
    protected $primaryKey = 'id_pagina';

    /**
     * set created_at
     */
    const CREATED_AT = 'dt_criacao';

    /**
     * set updated_at
     */
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

    /**
     * set input hidden
     *
     * @var array
     */
    protected $hidden = ['dt_alteracao', 'dt_criacao'];

    /**
     * set logging
     */
    protected static $logAttributes = [
        'tp_busca',
        'txt_titulo_busca',
        'txt_titulo',
        'txt_pagina',
        'url_pagina',
        'ds_palavra_chave',
        'fl_status'
    ];

    /**
     * set log fillable
     *
     * @var bool
     */
    protected static $logFillable = true;

    /**
     * set log name
     *
     * @var string
     */
    protected static $logName = 'paginas_principais';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paginas.
 *
 * @package namespace App\Models;
 */
class Paginas extends Model
{

    /**
     * Conexão database website
     */
//    protected $connection = 'sqlsrv-website';
//    protected $table = 'tb_sinpro_noticias';

    /**
     * Conexão teste Postgre
     */
    protected $connection = 'pgsql';
    protected $table = 'tb_sinpro_admin_paginas';

    /**
     * configura primary key
     *
     * @var string
     */
    protected $primaryKey = 'id_pagina';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_pagina',
        'ds_pagina',
        'url_pagina'
    ];

    public $timestamps = false;

}

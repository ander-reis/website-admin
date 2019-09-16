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
     * Conexão teste Postgre
     */
//    protected $connection = 'pgsql';
    protected $connection = 'sqlsrv-site';

    protected $table = 'tb_admin_paginas';

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
        'ds_pagina',
        'url_pagina'
    ];

    public $timestamps = false;

}

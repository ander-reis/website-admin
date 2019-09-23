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
     * Conexão novo database
     *
     * @var string
     */
    protected $connection = 'sqlsrv-site';

    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_admin_paginas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ds_pagina',
        'url_pagina'
    ];

    /**
     * set datetime
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * set Logging
     */
    protected static $logAttributes = [
        'ds_pagina',
        'url_pagina'
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
    protected static $logName = 'paginas';
}

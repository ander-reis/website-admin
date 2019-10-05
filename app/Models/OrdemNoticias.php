<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class OrdemNoticias.
 *
 * @package namespace App\Models;
 */
class OrdemNoticias extends Model implements Transformable
{
    use TransformableTrait, LogsActivity;

    /**
     * conexão novo database
     *
     * @var string
     */

    protected $connection = 'sqlsrv-website';
    /**
     * table
     * @var string
     */
    protected $table = 'tb_sinpro_admin_ordem_noticia';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_noticia', 'ordem_noticia'];

    /**
     * set datetime
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * set logging
     */
    protected static $logAttributes = ['id_noticia', 'ordem_noticia'];

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
    protected static $logName = 'ordem_noticias';
}

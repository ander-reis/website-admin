<?php

namespace App\Models;

use App\Traits\RevistaGizPaths;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class HomePage.
 *
 * @package namespace App\Models;
 */
class HomePage extends Model implements Transformable
{
    use TransformableTrait, RevistaGizPaths, LogsActivity;

    /**
     * conexão novo database
     *
     * @var string
     */
//    protected $connection = 'sqlsrv-website';

    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_admin_home_page';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ds_categoria',
        'ds_titulo',
        'ds_texto_noticia',
        'ds_link',
        'ds_imagem',
        'created_at',
        'updated_at'
    ];

    /**
     * set logging
     */
    protected static $logAttributes = [
        'ds_categoria',
        'ds_titulo',
        'ds_texto_noticia',
        'ds_link',
        'ds_imagem',
        'created_at',
        'updated_at'
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
    protected static $logName = 'home_page';
}

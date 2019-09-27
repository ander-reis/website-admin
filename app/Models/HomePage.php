<?php

namespace App\Models;

use App\Traits\RevistaGizPaths;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class HomePage.
 *
 * @package namespace App\Models;
 */
class HomePage extends Model implements Transformable
{
    use TransformableTrait, RevistaGizPaths;

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
}

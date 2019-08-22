<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class NoticiasCategoria.
 *
 * @package namespace App\Models;
 */
class NoticiasCategoria extends Model implements Transformable
{
    use TransformableTrait, LogsActivity;

    /**
     * Conexão teste Postgre
     */
//    protected $connection = 'pgsql';

    protected $table = 'tb_sinpro_noticias_categorias';

    /**
     * @var string
     */
//    protected $primaryKey = 'id_categoria';
    /**
     * @var bool
     */
    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ds_categoria'];

    /**
     * Relacionamento categoria para noticias, um para muitos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function noticias()
    {
        return $this->hasMany(Noticias::class, 'id_categoria');
    }

    /**
     * Configurações Logging
     */
    protected static $logAttributes = [
        'ds_categoria'
    ];

    protected static $logFillable = true;

    protected static $logName = 'noticias_categorias';
}

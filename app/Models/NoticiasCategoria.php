<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class NoticiasCategoria.
 *
 * @package namespace App\Models;
 */
class NoticiasCategoria extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * Conexão database website
     */
//    protected $connection = 'sqlsrv-website';
//    protected $table = 'tb_sinpro_noticias_categorias';


    /**
     * Conexão teste Postgre
     */
    protected $connection = 'pgsql';
    protected $table = 'tb_sinpro_noticias_categorias';

    /**
     * @var string
     */
    protected $primaryKey = 'id_categoria';
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
}

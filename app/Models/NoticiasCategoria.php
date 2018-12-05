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
     * Table
     *
     * @var $table string
     */
    protected $table = 'tb_sinpro_noticias_categorias';

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
     * Mutators formata data criação
     *
     * @return string
     * @throws \Exception
     */
    public function getCreatedAtFormattedAttribute()
    {
        return (new \DateTime($this->created_at))->format('d/m/Y');
    }

    /**
     * Mutators formata data edição
     *
     * @return string
     * @throws \Exception
     */
    public function getUpdatedAtFormattedAttribute()
    {
        return (new \DateTime($this->updated_at))->format('d/m/Y');
    }
}

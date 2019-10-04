<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ConvencoesEntidade.
 *
 * @package namespace App\Models;
 */
class ConvencoesEntidade extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * conexão novo database
     *
     * @var string
     */
    protected $connection = 'sqlsrv-website';

    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_convencoes_entidades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ds_entidade'
    ];

    /**
     * Relacionamento entidade para convencoes, um para muitos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function convencoes()
    {
        return $this->hasMany(Convencoes::class, 'fl_entidade');
    }
}

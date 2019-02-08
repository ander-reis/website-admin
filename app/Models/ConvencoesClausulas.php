<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ConvencoesClausulas.
 *
 * @package namespace App\Models;
 */
class ConvencoesClausulas extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * Conexão database website
     */
//    protected $connection = 'sqlsrv-website';
//    protected $table = 'tb_sinpro_convencoes_clausulas';

    /**
     * Conexão teste Postgre
     */
    protected $connection = 'pgsql';
    protected $table = 'tb_sinpro_convencoes_clausulas';

    /**
     * configura primary key
     *
     * @var string
     */
    protected $primaryKey = 'id_clausula';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_convencao',
        'num_clausula',
        'ds_titulo',
        'ds_texto',
        'ds_palavra_chave',
        'fl_ativo'
    ];

    /**
     * Relacionamento convencao para clausula, um para muitos
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function convencao()
    {
        return $this->belongsTo(Convencoes::class, 'id_convencao');
    }

    /**
     * Accessor formata fl_ativo
     *
     * @return string
     */
    public function getFlAtivoFormattedAttribute()
    {
        return ($this->fl_ativo == 'S') ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Oculto</span>';
    }

    /**
     * Accessor formata ds_titulo para 6 palavras
     *
     * @return string
     */
    public function getDsTituloClausulaFormattedAttribute()
    {
        return Str::words(strip_tags($this->ds_titulo), 3, '...');
    }
}

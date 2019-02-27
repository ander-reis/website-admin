<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Traits\ConvencaoPaths;

/**
 * Class Convencoes.
 *
 * @package namespace App\Models;
 */
class Convencoes extends Model implements Transformable
{
    use TransformableTrait, ConvencaoPaths;

    /**
     * Conexão database website
     */
//    protected $connection = 'sqlsrv-website';
//    protected $table = 'tb_sinpro_convencoes';

    /**
     * Conexão teste Postgre
     */
    protected $connection = 'pgsql';
    protected $table = 'tb_sinpro_convencoes';

    /**
     * Configura primary key
     *
     * @var string
     */
    protected $primaryKey = 'id_convencao';

    /**
     * Configura a criação dos campos created_at e updated_at no banco de dados
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ds_titulo',
        'dt_validade',
        'url_arquivo',
        'ds_titulo_aditamento',
        'url_aditamento',
        'fl_app',
        'fl_entidade',
        'fl_ativo'
    ];

    /**
     * Configura os campos que não deverão aparecer na coleção
     *
     * @var array
     */
    protected $hidden = [
        'url_arquivo',
        'url_aditamento',
    ];

    /**
     * Relacionamento convencoes para entidade, um para um
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function entidade()
    {
        return $this->belongsTo(ConvencoesEntidade::class, 'fl_entidade');
    }

    /**
     * Relacionamento convencoes para clausulas, muitos para muitos
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clausulas()
    {
        return $this->hasMany(ConvencoesClausulas::class, 'id_convencao');
    }

    /**
     * Accessor para normatizar nome da entidade para o pdf
     *
     * @return mixed
     */
    public function getEntidadeNameAttribute()
    {
        $name = $this->entidade->ds_entidade;
        $name = str_replace(" ", "", $name);
        return $entidade = removeSpecialChars($name);
    }
}

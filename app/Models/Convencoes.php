<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use App\Traits\ConvencaoPaths;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Convencoes.
 *
 * @package namespace App\Models;
 */
class Convencoes extends Model implements Transformable
{
    use TransformableTrait, ConvencaoPaths, LogsActivity;

    /**
     * conexão novo database
     *
     * @var string
     */
//    protected $connection = 'sqlsrv-site';

    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_convencoes';

    /**
     * set primary key
     *
     * @var string
     */
    protected $primaryKey = 'id_convencao';

    /**
     * set datetime
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
        'fl_status'
    ];

    /**
     * set input hidden
     *
     * @var array
     */
    protected $hidden = [
        'url_arquivo',
        'url_aditamento',
        'fl_ativo'
    ];

    /**
     * set log
     */
    protected static $logAttributes = [
        'ds_titulo',
        'dt_validade',
        'url_arquivo',
        'ds_titulo_aditamento',
        'url_aditamento',
        'fl_app',
        'fl_entidade',
        'fl_status'
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
    protected static $logName = 'convencoes';

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
}

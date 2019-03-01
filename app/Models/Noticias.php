<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Noticias.
 *
 * @package namespace App\Models;
 */
class Noticias extends Model implements Transformable
{
    use TransformableTrait, LogsActivity;

    /**
     * Conexão database website
     */
//    protected $connection = 'sqlsrv-website';
//    protected $table = 'tb_sinpro_noticias';

    /**
     * Conexão teste Postgre
     */
    protected $connection = 'pgsql';
    protected $table = 'tb_sinpro_noticias';

    /**
     * configura primary key
     *
     * @var string
     */
    protected $primaryKey = 'id_noticia';

    /**
     * configura CREATED_AT
     */
    const CREATED_AT = 'dt_cadastro';

    const UPDATED_AT = 'dt_alteracao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_categoria',
        'dt_cadastro',
        'dt_expira',
        'dt_noticia',
        'fl_exibir_destaque',
        'ds_resumo',
        'ds_texto',
        'ds_palavra_chave',
        'fl_oculta'
    ];

    /**
     * logging
     */
    protected static $logAttributes = [
        'id_categoria',
        'dt_cadastro',
        'dt_expira',
        'dt_noticia',
        'fl_exibir_destaque',
        'ds_resumo',
        'ds_texto',
        'ds_palavra_chave',
        'fl_oculta'
    ];

    protected static $logFillable = true;

    protected static $logName = 'noticias';

    /**
     * Dates
     *
     * @var array
     */
    protected $dates = ['dt_noticia'];

    /**
     * Relacionamento noticias para categorias, um para um
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(NoticiasCategoria::class, 'id_categoria');
    }

    /**
     * Mutators formata data -> 01/01/2000
     *
     * @return string
     * @throws \Exception
     */
    public function getDtCadastroFormattedAttribute()
    {
        return (new \DateTime($this->dt_cadastro))->format('d/m/Y');
    }

    /**
     * Mutators formata data para o form de edição -> 2000-12-30
     *
     * @return string
     * @throws \Exception
     */
    public function getDtCadastroUTCFormattedAttribute()
    {
        return (new \DateTime($this->dt_cadastro))->format('Y-m-d');
    }

    /**
     * Mutators formata hr_expira -> 12:00
     *
     * @return bool|string
     */
    public function getHrNoticiaFormattedAttribute()
    {
        return substr($this->dt_cadastro, 11, -3);
    }
}

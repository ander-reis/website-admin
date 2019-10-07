<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
    protected $table = 'tb_sinpro_noticias';

    /**
     * set created_at
     */
    const CREATED_AT = 'dt_cadastro';

    /**
     * set updated_at
     */
    const UPDATED_AT = 'dt_alteracao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_noticia',
        'id_categoria',
        'dt_noticia',
        'dt_cadastro',
        'dt_alteracao',
        'ds_resumo',
        'ds_texto',
        'ds_palavra_chave',
        'fl_status',
        'fl_oculta',
    ];

    /**
     * Dates
     *
     * @var array
     * date: 2019-08-30 10:22:15.187 America/Sao_Paulo (-03:00)
     * date: 2019-10-07 14:12:24.0 America/Sao_Paulo (-03:00)
     */
    protected $dates = ['dt_noticia', 'dt_cadastro', 'dt_alteracao'];

    /**
     * set logging
     */
    protected static $logAttributes = [
        'id_categoria',
        'dt_cadastro',
        'dt_alteracao',
        'dt_noticia',
        'ds_resumo',
        'ds_texto',
        'ds_palavra_chave',
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
    protected static $logName = 'noticias';

    /**
     * Mutators formata data para o form de edição -> 2000-12-30
     *
     * @return string
     * @throws \Exception
     */
    public function getDtCadastroUTCFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->dt_noticia);
    }

    /**
     * Mutators formata hr_expira -> 12:00
     *
     * @return bool|string
     */
    public function getHrNoticiaFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->dt_noticia);
    }

    /**
     * Relacionamento noticias para categorias, um para um
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria()
    {
        return $this->belongsTo(NoticiasCategoria::class, 'id_categoria');
    }
}

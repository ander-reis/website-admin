<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Noticias.
 *
 * @package namespace App\Models;
 */
class Noticias extends Model implements Transformable
{
    use TransformableTrait;

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

    /**
     * não permite a criação dos campos created_at e updated_at no database
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
     * Mutators formata data
     *
     * @return string
     * @throws \Exception
     */
    public function getDtNoticiaFormattedAttribute()
    {
        return (new \DateTime($this->dt_noticia))->format('d/m/Y');
    }

    /**
     * Mutators formata data
     *
     * @return string
     * @throws \Exception
     */
    public function getCreatedAtFormattedAttribute()
    {
        return (new \DateTime($this->dt_cadastro))->format('d/m/Y');
    }

    /**
     * Mutators formata status da notícia
     *
     * @return string
     */
    public function getFlOcultaFormattedAttribute()
    {
        return $this->fl_oculta ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Oculto</span>';
    }

    /**
     * Mutators formata hr_expira
     *
     * @return bool|string
     */
    public function getHrNoticiaFormattedAttribute()
    {
        return substr($this->dt_noticia, 11, -3);
    }
}

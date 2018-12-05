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
     * Table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_noticias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_categoria',
        'dt_noticia',
        'fl_exibir_destaque',
        'ds_resumo',
        'ds_texto',
        'ds_palavra_chave',
        'fl_oculta'
    ];

    /**
     * Dates
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
     * Concatena data e hora
     *
     * @param $date
     * @param $hour
     * @return string
     */
    public static function convertDateTime($date, $hour)
    {
        return $date . ' ' . $hour . ':00';
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
        return (new \DateTime($this->created_at))->format('d/m/Y');
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

    /**
     * Mutators formata limit ds_texto
     *
     * @return string
     */
    public function getDsTextoFormattedAttribute()
    {
        return Str::words(strip_tags($this->ds_texto), 5, '...');
    }

    /**
     * Mutators formata ds_resumo para 6 palavras
     *
     * @return string
     */
    public function getDsResumoNoticiaAttribute()
    {
        return Str::words(strip_tags($this->ds_resumo), 6, '...');
    }

    /**
     * Mutators formata ds_resumo para 10 palavras no destaque da home
     * @return string
     */
    public function getDsTextoHomeDestaqueRowAttribute()
    {
        return Str::words(strip_tags($this->ds_texto), 10, '...');
    }

    /**
     * Mutators formata ds_resumo para 100 palavras na coluna
     * @return string
     */
    public function getDsTextoHomeDestaqueColAttribute()
    {
        return Str::words(strip_tags($this->ds_texto), 100, '...');
    }
}

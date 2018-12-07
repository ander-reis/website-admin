<?php

namespace App\Models;

use App\Traits\SliderPaths;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Slider.
 *
 * @package namespace App\Models;
 */
class Slider extends Model implements Transformable
{
    use TransformableTrait, SliderPaths;

    /**
     * Table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_slider';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ds_label',
        'ds_titulo',
        'ds_imagem',
        'ds_link',
        'fl_ativo'
    ];

    /**
     * Mutators formata status do slide
     *
     * @return string
     */
    public function getFlAtivoFormattedAttribute()
    {
        return $this->fl_ativo ? '<span class="badge badge-success">Ativo</span>' : '<span class="badge badge-danger">Oculto</span>';
    }
}

<?php

namespace App\Models;

use App\Traits\SliderPaths;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Slider.
 *
 * @package namespace App\Models;
 */
class Slider extends Model implements Transformable
{
    use TransformableTrait, SliderPaths, LogsActivity;

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
     * Configurações Logging
     */
    protected static $logAttributes = [
        'ds_label',
        'ds_titulo',
        'ds_imagem',
        'ds_link',
        'fl_ativo'
    ];

    protected static $logFillable = true;

    //protected static $ignoreChangedAttributes = ['ds_imagem'];

    protected static $logName = 'slider';
}

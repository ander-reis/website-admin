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
     * conexão novo database
     *
     * @var string
     */
//    protected $connection = 'sqlsrv-website';

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
     * set logging
     */
    protected static $logAttributes = [
        'ds_label',
        'ds_titulo',
        'ds_imagem',
        'ds_link',
        'fl_ativo'
    ];

    /**
     * set log fillble
     *
     * @var bool
     */
    protected static $logFillable = true;

    /**
     * @var array
     */
//    protected static $ignoreChangedAttributes = ['ds_imagem'];

    /**
     * set log name
     *
     * @var string
     */
    protected static $logName = 'slider';
}

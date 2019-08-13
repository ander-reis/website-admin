<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class OwlCarousel.
 *
 * @package namespace App\Models;
 */
class OwlCarousel extends Model implements Transformable
{
    use TransformableTrait, LogsActivity;

    /**
     * Table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_owl_carousel';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ds_icone',
        'ds_titulo',
        'ds_link'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * Configurações Logging
     */
    protected static $logAttributes = [
        'ds_icone',
        'ds_titulo',
        'ds_link'
    ];

    protected static $logFillable = true;

    protected static $logName = 'owl_carousel';
}

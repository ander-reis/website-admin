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
     * table
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
     * set datetime
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * set Logging
     */
    protected static $logAttributes = [
        'ds_icone',
        'ds_titulo',
        'ds_link'
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
    protected static $logName = 'owl_carousel';
}

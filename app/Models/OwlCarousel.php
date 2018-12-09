<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class OwlCarousel.
 *
 * @package namespace App\Models;
 */
class OwlCarousel extends Model implements Transformable
{
    use TransformableTrait;

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

}

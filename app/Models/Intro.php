<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Intro.
 *
 * @package namespace App\Models;
 */
class Intro extends Model implements Transformable
{
    use TransformableTrait;

    protected $connection = 'sqlsrv-site';

    protected $table = 'tb_sinpro_intro';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    public function getDtDeAttribute($value)
    {
        $date = \Carbon\Carbon::parse($value);

        return $date->format('d/m/Y H:i:s');
    }

    public function getDtAteAttribute($value)
    {
        $date = \Carbon\Carbon::parse($value);

        return $date->format('d/m/Y H:i:s');
    }
}

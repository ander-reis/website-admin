<?php

namespace App\Models;

use App\Traits\IntroPaths;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Intro.
 *
 * @package namespace App\Models;
 */
class Intro extends Model implements Transformable
{
    use TransformableTrait, IntroPaths, LogsActivity;

    /**
     * connection
     *
     * @var string
     */
    protected $connection = 'sqlsrv-site';

    /**
     * Table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_intro';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ds_titulo',
        'ds_imagem_desktop',
        'ds_imagem_mobile',
        'dt_de',
        'dt_ate',
        'ds_link'
    ];

    /**
     * set logging
     */
    protected static $logAttributes = [
        'ds_titulo',
        'ds_imagem_desktop',
        'ds_imagem_mobile',
        'dt_de',
        'dt_ate',
        'ds_link'
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
    protected static $logName = 'intro';

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

    public function setDtDeAttribute($value)
    {
        $date = \Carbon\Carbon::parse(str_replace("/", "-", $value));

        $this->attributes['dt_de'] = $date->format('Y-m-d H:i:s');
    }

    public function setDtAteAttribute($value)
    {
        $date = \Carbon\Carbon::parse(str_replace("/", "-", $value));

        $this->attributes['dt_ate'] = $date->format('Y-m-d H:i:s');
    }
}

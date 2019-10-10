<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class BoletimCadastro.
 *
 * @package namespace App\Models;
 */
class BoletimCadastro extends Model implements Transformable
{
    use TransformableTrait, LogsActivity;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_boletim_cadastro';

    /**
     * set created_at
     */
    const CREATED_AT = 'dt_cadastro';

    /**
     * set updated_at
     */
    const UPDATED_AT = null;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_boletim',
        'dt_boletim',
        'ds_destaque',
        'ds_link',
        'ds_tag',
        'dt_cadastro'
    ];

    /**
     * set logging
     */
    protected static $logAttributes = [
        'id_boletim',
        'dt_boletim',
        'ds_destaque',
        'ds_link',
        'ds_tag',
        'dt_cadastro'
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
    protected static $logName = 'boletim_cadastro';

    /**
     * Mutators formata data para o form de edição -> 2000-12-30
     *
     * @return string
     * @throws \Exception
     */
    public function getDtBoletimUTCFormattedAttribute()
    {
        return \Carbon\Carbon::parse($this->dt_boletim);
    }

}

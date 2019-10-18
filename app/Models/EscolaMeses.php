<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EscolaMeses extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_escola_meses';

    /**
     * chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'id_mes';

    protected $fillable = [];

    /**
     * set datetime
     *
     * @var bool
     */
    public $timestamps = false;
}

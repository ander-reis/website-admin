<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculosFormacao extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_curriculos_formacao';

    /**
     * chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'id_formacao';

    /**
     * datetime
     *
     * @var bool
     */
    public $timestamps = false;
}

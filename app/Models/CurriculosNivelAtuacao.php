<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculosNivelAtuacao extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_curriculos_nivel_atuacao';

    /**
     * chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'id_nivel_atuacao';

    /**
     * datetime
     *
     * @var bool
     */
    public $timestamps = false;
}

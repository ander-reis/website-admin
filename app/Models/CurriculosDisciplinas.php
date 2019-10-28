<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculosDisciplinas extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_curriculos_disciplinas';

    /**
     * chave primaria
     *
     * @var string
     */
    protected $primaryKey = 'id_disciplina';

    /**
     * datetime
     *
     * @var bool
     */
    public $timestamps = false;
}

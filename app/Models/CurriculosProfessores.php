<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurriculosProfessores extends Model
{
    protected $table = 'tb_sinpro_curriculos_professores';
    protected $primaryKey = 'id_curriculo';
    const CREATED_AT = 'dt_data_cadastro';
    const UPDATED_AT = 'dt_data_ult_atualizacao';
}

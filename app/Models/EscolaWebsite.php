<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EscolaWebsite extends Model
{
    protected $table = 'tb_sinpro_escolas';

    protected $fillable = ['escola', 'endereco', 'telefone'];
}

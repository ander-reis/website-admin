<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CadastroProfessor extends Model
{
    protected $table = 'Cadastro_Professores';
    protected $primaryKey = 'Codigo_Professor';
    protected $rememberTokenName = null;
    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Codigo_Professor',
        'Nome',
        'CPF',
        'Email',
        'Materia',
        'Pre',
        '1_4Serie',
        '5_8Serie',
        'Ens_Medio',
        'Ens_Superior',
        '2_3Grau',
        'Tecnico',
        'Supletivo',
        'Curso_Livre',
        'CEP',
        'Endereco',
        'Numero',
        'Complemento',
        'Bairro',
        'Cidade',
        'Estado',
        'DDD_Telefone_Residencial',
        'Telefone_Residencial',
        'DDD_Telefone_Comercial',
        'Telefone_Comercial',
        'DDD_Telefone_Celular',
        'Telefone_Celular',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];
}

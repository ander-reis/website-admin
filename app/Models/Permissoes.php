<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Permissoes.
 *
 * @package namespace App\Models;
 */
class Permissoes extends Model
{
    /**
     * table
     *
     * @var string
     */
    protected $table = 'tb_sinpro_admin_permissoes_website';

    /**
     * set created_at
     */
    const CREATED_AT = 'dt_cadastro';

    /**
     * set updated_at
     */
    const UPDATED_AT = 'dt_alteracao';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario',
        'id_pagina',
        'fl_consulta',
        'fl_cadastro',
        'fl_alteracao',
        'fl_exclusao',
        'dt_cadastro',
        'dt_alteracao'
    ];

    /**
     * set logging
     */
    protected static $logAttributes = [
        'id_usuario',
        'id_pagina',
        'fl_consulta',
        'fl_cadastro',
        'fl_alteracao',
        'fl_exclusao',
        'dt_cadastro',
        'dt_alteracao'
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
    protected static $logName = 'permissoes';

    /**
     * Relacionamento usuarios para permissoes, um para um
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    /**
     * Relacionamento paginas para permissoes, um para um
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pagina()
    {
        return $this->belongsTo(Paginas::class, 'id');
    }
}

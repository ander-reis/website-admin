<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'Materia';
    protected $primaryKey = 'Codigo_Materia';
    public $timestamps = false;
}

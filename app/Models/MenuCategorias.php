<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuCategorias extends Model
{
    protected $table = 'tb_sinpro_menu_categorias';

    protected $fillable = ['label', 'class_active'];

    public $timestamps = false;
}

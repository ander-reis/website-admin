<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproAdminPermissoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_permissoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario');
            $table->integer('id_pagina');
            $table->char('fl_consulta', 1)->default(1);
            $table->char('fl_cadastro', 1)->default(0);
            $table->char('fl_alteracao', 1)->default(0);
            $table->char('fl_exclusao', 1)->default(0);
            $table->dateTime('dt_cadastro')->default(Carbon\Carbon::now());
            $table->dateTime('dt_alteracao')->default(Carbon\Carbon::now());

//            $table->foreign('id_usuario')->references('id')->on('tb_sinpro_usuarios');
//            $table->foreign('id_pagina')->references('id')->on('tb_sinpro_admin_paginas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('tb_sinpro_permissoes');
    }
}

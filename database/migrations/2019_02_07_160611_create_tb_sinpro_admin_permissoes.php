<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproAdminPermissoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_admin_permissoes', function (Blueprint $table) {
            $table->integer('id_usuario');
            $table->integer('id_pagina');
            $table->char('fl_consulta', 1)->default(0);
            $table->char('fl_cadastro', 1)->default(0);
            $table->char('fl_alteracao', 1)->default(0);
            $table->char('fl_exclusao', 1)->default(0);
            $table->timestamps();

            $table->foreign('id_usuario')->references('id_usuario')->on('tb_sinpro_usuarios');
            $table->foreign('id_pagina')->references('id_pagina')->on('tb_sinpro_admin_paginas');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_sinpro_admin_permissoes');
    }
}

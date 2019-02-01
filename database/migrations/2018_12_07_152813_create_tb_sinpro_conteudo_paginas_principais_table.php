<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproConteudoPaginasPrincipaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_conteudo_paginas_principais', function (Blueprint $table) {
            $table->increments('id_pagina');
            $table->smallInteger('tp_busca');
            $table->string('txt_titulo_busca', 75);
            $table->string('txt_titulo', 75);
            $table->text('txt_pagina');
            $table->string('url_pagina', 100)->unique();
            $table->string('ds_palavra_chave', 150);
            $table->dateTime('dt_criacao');
            $table->dateTime('dt_alteracao');
            $table->tinyInteger('fl_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_sinpro_conteudo_paginas_principais');
    }
}

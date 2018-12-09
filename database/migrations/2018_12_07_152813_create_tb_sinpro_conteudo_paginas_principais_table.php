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
            $table->increments('id');
            $table->smallInteger('tp_busca');
            $table->string('txt_titulo_busca', 75);
            $table->string('txt_titulo', 75);
            $table->text('ds_texto');
            $table->string('url_pagina', 100)->unique();
            $table->string('ds_palavra_chave', 150)->nullable();
            $table->char('fl_status', 1);
            $table->timestamps();
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

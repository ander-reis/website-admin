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
            $table->smallInteger('tp_busca')->default(0);
            $table->string('txt_titulo_busca', 75)->default('');
            $table->string('txt_titulo', 75)->default('');
            $table->text('ds_texto')->default('');
            $table->string('url_pagina', 100)->default('');
            $table->string('url', 100)->unique()->default('');
            $table->string('ds_palavra_chave', 150)->default('');
            $table->char('fl_status',1)->default(1);
            $table->dateTime('dt_criacao');
            $table->dateTime('dt_alteracao');
            /**
             * postgres não tem o campo tinyInt
             */
//            $table->char('fl_status', 1);
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

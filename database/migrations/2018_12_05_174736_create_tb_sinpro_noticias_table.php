<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_noticias', function (Blueprint $table) {
            $table->increments('id_noticia');
            $table->integer('id_categoria')->nullable();
            $table->dateTime('dt_cadastro')->default('1/1/1900');
            $table->dateTime('dt_expira')->default('1/1/1900')->nullable();
            $table->char('fl_exibir_destaque', 1);
            $table->string('ds_resumo', 80);
            $table->text('ds_texto');
            $table->string('ds_palavra_chave', 150)->nullable();
            $table->char('fl_oculta', 1);

            $table->foreign('id_categoria')->references('id_categoria')->on('tb_sinpro_noticias_categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_sinpro_noticias');
    }
}

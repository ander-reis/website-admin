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
            $table->increments('id');
            $table->integer('id_categoria')->unsigned();
            $table->dateTime('dt_noticia')->nullable();
            $table->char('fl_exibir_destaque', 1);
            $table->string('ds_resumo', 80)->nullable();
            $table->text('ds_texto')->nullable();
            $table->string('ds_palavra_chave', 150)->nullable();
            $table->char('fl_oculta', 1);
            $table->timestamps();

            $table->foreign('id_categoria')->references('id')->on('tb_sinpro_noticias_categorias');
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

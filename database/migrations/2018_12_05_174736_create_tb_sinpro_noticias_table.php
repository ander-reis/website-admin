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
            $table->integer('id_noticia')->default(0);
            $table->integer('id_categoria')->default(19);
            $table->dateTime('dt_noticia', 3)->nullable()->default(\Carbon\Carbon::now());
            $table->dateTime('dt_cadastro', 3)->default(\Carbon\Carbon::now());
            $table->dateTime('dt_alteracao', 3)->default(\Carbon\Carbon::now());
            $table->dateTime('dt_expira', 3)->default('1/1/1900');
            $table->char('fl_exibir_destaque', 1)->default('S');
            $table->string('ds_resumo', 80)->default('');
            $table->text('ds_texto')->default('');
            $table->string('ds_palavra_chave', 150)->default('');
            $table->char('fl_oculta', 1)->default('N');
            $table->smallInteger('fl_status')->default(1);

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

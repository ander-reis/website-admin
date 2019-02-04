<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproConvencoesClausulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_convencoes_clausulas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_convencao');
            $table->integer('num_clausula');
            $table->string('ds_titulo', 150);
            $table->text('ds_texto');
            $table->string('ds_palavra_chave', 150)->nullable();
            $table->char('fl_ativo', 1)->default(1);
            $table->timestamps();

            $table->foreign('id_convencao')->references('id_convencao')->on('tb_sinpro_convencoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_sinpro_convencoes_clausulas');
    }
}

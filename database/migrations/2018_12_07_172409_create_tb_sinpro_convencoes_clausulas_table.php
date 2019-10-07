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
            $table->increments('id_clausula');
            $table->integer('id_convencao')->default(0);
            $table->integer('num_clausula')->default(0);
            $table->string('ds_titulo', 150)->default('');
            $table->text('ds_texto')->default('');
            $table->string('ds_palavra_chave', 150)->nullable();
            $table->char('fl_ativo', 1)->default('S');
            $table->tinyInteger('fl_status')->default(1);

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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproConvencoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_convencoes', function (Blueprint $table) {
            $table->increments('id_convencao');
            $table->string('ds_titulo', 100)->default('');
            $table->string('dt_validade', 9)->default('');
            $table->string('url_arquivo', 100)->default('');
            $table->string('ds_titulo_aditamento', 100)->default('');
            $table->string('url_aditamento', 100)->default('');
            $table->char('fl_app', 1)->default('0');
            $table->integer('fl_entidade')->default(0);
            $table->char('fl_ativo', 1)->default('S');

            $table->foreign('fl_entidade')->references('id')->on('tb_sinpro_convencoes_entidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_sinpro_convencoes');
    }
}

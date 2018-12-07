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
            $table->increments('id');
            $table->integer('fl_entidade');
            $table->string('ds_titulo', 100)->nullable();
            $table->string('dt_validade', 9)->nullable();
            $table->string('url_arquivo', 100)->nullable();
            $table->string('ds_titulo_aditamento', 100)->nullable();
            $table->string('url_aditamento', 100)->nullable();
            $table->char('fl_app', 1)->default(0);
            $table->char('fl_ativo', 1)->default(0);
            $table->timestamps();

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

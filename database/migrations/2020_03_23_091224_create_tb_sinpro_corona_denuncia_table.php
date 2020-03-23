<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproCoronaDenunciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_corona_denuncia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_motivo');
            $table->string('ds_descricao', 500);
            $table->string('ds_funcionario', 100);
            $table->timestamps();

            $table->foreign('id_motivo')->references('id')->on('tb_sinpro_corona_motivos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_sinpro_corona_denuncia');
    }
}

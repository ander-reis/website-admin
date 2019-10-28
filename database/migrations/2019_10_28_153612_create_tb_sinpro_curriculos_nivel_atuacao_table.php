<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproCurriculosNivelAtuacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_curriculos_nivel_atuacao', function (Blueprint $table) {
            $table->bigIncrements('id_nivel_atuacao');
            $table->string('ds_nivel_atuacao', 30);
//            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_sinpro_curriculos_nivel_atuacao');
    }
}

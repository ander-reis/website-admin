<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproAtendimentoDepartamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_atendimento_departamentos', function (Blueprint $table) {
            $table->increments('id_departamento');
            $table->string('ds_departamento', 80)->default('');
            $table->string('ds_email', 80)->default('');
            $table->tinyInteger('fl_status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_sinpro_atendimento_departamentos');
    }
}

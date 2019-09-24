<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproAtendimentoChamadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_atendimento_chamado', function (Blueprint $table) {
            $table->increments('id_chamado');
            $table->string('ds_nome', 50)->default('');
            $table->string('ds_email', 80)->default('');
            $table->smallInteger('fl_departamento')->default(0);
            $table->text('ds_texto')->default('');
            $table->text('ds_texto_resposta')->default('');
            $table->dateTime('dt_cadastro');
            $table->dateTime('dt_resposta');
            $table->smallInteger('id_responsavel');
            $table->string('ds_ip', 15)->default('000.000.000.000');
            $table->char('fl_oculta');
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
        Schema::dropIfExists('tb_sinpro_atendimento_chamado');
    }
}

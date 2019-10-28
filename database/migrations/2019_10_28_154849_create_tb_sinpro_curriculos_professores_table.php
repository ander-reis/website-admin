<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproCurriculosProfessoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_curriculos_professores', function (Blueprint $table) {
            $table->bigIncrements('id_curriculo');
            $table->string('ds_cpf', 14);
            $table->string('ds_matricula', 6);
            $table->string('ds_nome', 50);
            $table->string('ds_sexo', 1);
            $table->integer('int_estado_civil');
            $table->dateTime('dt_data_nasc');
            $table->string('ds_endereco', 100);
            $table->string('ds_bairro', 50);
            $table->string('ds_cidade', 30);
            $table->string('ds_estado', 2);
            $table->string('ds_cep', 9);
            $table->string('ds_pais', 30);
            $table->string('ds_mail', 80);
            $table->string('ds_fone', 20);
            $table->string('ds_celular', 20);
            $table->string('ds_fax', 20);
            $table->string('ds_salario', 13);
            $table->integer('int_empregado');
            $table->integer('int_disp_horario');
            $table->integer('int_disp_cidade');
            $table->integer('int_formacao');
            $table->string('ds_outra_formacao', 30);
            $table->integer('int_disciplina')->default(0);
            $table->integer('int_nivel_atuacao');
            $table->text('ds_objetivo');
            $table->text('ds_qualificacao');
            $table->text('ds_experiencia');
            $table->string('ds_user', 15);
            $table->string('ds_pass', 15);
            $table->integer('int_ativo');
            $table->dateTime('dt_data_cadastro');
            $table->dateTime('dt_data_ult_atualizacao');
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
        Schema::dropIfExists('tb_sinpro_curriculos_professores');
    }
}

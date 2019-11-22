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
            $table->string('ds_matricula', 6)->nullable();
            $table->string('ds_nome', 50);
            $table->string('ds_sexo', 1)->nullable();
            $table->integer('int_estado_civil')->nullable();
            $table->dateTime('dt_data_nasc')->nullable();
            $table->string('ds_endereco', 100)->nullable();
            $table->string('ds_bairro', 50)->nullable();
            $table->string('ds_cidade', 30)->nullable();
            $table->string('ds_estado', 2)->nullable();
            $table->string('ds_cep', 9)->nullable();
            $table->string('ds_pais', 30)->nullable();
            $table->string('email', 80)->unique();
            $table->string('ds_fone', 20)->nullable();
            $table->string('ds_celular', 20)->nullable();
            $table->string('ds_fax', 20)->nullable();
            $table->string('ds_salario', 13)->nullable();
            $table->integer('int_empregado')->nullable();
            $table->integer('int_disp_horario')->nullable();
            $table->integer('int_disp_cidade')->nullable();
            $table->integer('int_formacao')->nullable();
            $table->string('ds_outra_formacao', 30)->nullable();
            $table->integer('int_disciplina')->default(0)->nullable();
            $table->integer('int_nivel_atuacao')->nullable();
            $table->text('ds_objetivo')->nullable();
            $table->text('ds_qualificacao')->nullable();
            $table->text('ds_experiencia')->nullable();
            $table->string('ds_user', 15)->nullable();
            $table->string('ds_pass', 15)->nullable();
            $table->integer('int_ativo')->nullable();
            $table->dateTime('dt_data_cadastro');
            $table->dateTime('dt_data_ult_atualizacao');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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

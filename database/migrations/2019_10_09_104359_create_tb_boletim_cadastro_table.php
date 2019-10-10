<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbBoletimCadastroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_boletim_cadastro', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_boletim');
            $table->dateTime('dt_boletim', 3)->default('1/1/1900');
            $table->string('ds_destaque', 100)->default('');
            $table->string('ds_link', 100)->default('');
            $table->string('ds_tag', 100)->default('');
            $table->dateTime('dt_cadastro', 3)->default(\Carbon\Carbon::now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_boletim_cadastro');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproBuscaTermosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_busca_termos', function (Blueprint $table) {
//            $table->bigIncrements('id');
            $table->string('txt_termo', 50)->default('');
            $table->dateTime('dt_busca')->default(\Carbon\Carbon::now());
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
        Schema::dropIfExists('tb_sinpro_busca_termos');
    }
}

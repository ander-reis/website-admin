<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproEscolaMesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_escola_meses', function (Blueprint $table) {
            $table->bigIncrements('id_mes');
            $table->smallInteger('num_mes')->default(0);
            $table->smallInteger('num_ano')->default(0);
            $table->tinyInteger('fl_status')->default(1);
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
        Schema::dropIfExists('tb_sinpro_escola_meses');
    }
}

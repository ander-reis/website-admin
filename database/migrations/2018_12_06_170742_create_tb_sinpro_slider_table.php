<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_slider', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ds_label', 15)->nullable();
            $table->string('ds_titulo', 30)->nullable();
            $table->string('ds_imagem', 100);
            $table->string('ds_link', 255)->nullable();
            $table->char('fl_ativo', 1)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_sinpro_slider');
    }
}

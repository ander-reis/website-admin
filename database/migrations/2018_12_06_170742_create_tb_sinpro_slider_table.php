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
            $table->string('ds_label', 30)->default('');
            $table->string('ds_titulo', 70)->default('');
            $table->string('ds_imagem', 100)->default('');
            $table->string('ds_link', 60)->default('');
            $table->smallInteger('fl_ordem')->default(0);
            $table->tinyInteger('fl_ativo')->default(1);
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

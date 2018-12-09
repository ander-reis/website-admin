<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproOwlCarouselTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_owl_carousel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ds_icone', 100);
            $table->string('ds_titulo', 30);
            $table->string('ds_link', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_sinpro_owl_carousel');
    }
}

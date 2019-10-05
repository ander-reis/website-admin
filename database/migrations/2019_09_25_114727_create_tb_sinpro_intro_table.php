<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateIntrosTable.
 */
class CreateTbSinproIntroTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_sinpro_intro', function(Blueprint $table) {
            $table->increments('id');
            $table->string('ds_titulo', 50)->default('');
            $table->string('ds_imagem_desktop', 50)->default('');
            $table->string('ds_imagem_mobile', 50)->default('');
            $table->dateTime('dt_de')->default(\Carbon\Carbon::now());
            $table->dateTime('dt_ate')->default(\Carbon\Carbon::now());
            $table->string('ds_link', 60)->default('');
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
		Schema::drop('tb_sinpro_intro');
	}
}

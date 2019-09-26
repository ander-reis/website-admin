<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateHomePageTempsTable.
 */
class CreateHomePageTempsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('home_page_temp', function(Blueprint $table) {
            $table->increments('id');
            $table->string('ds_categoria', 50)->default('');
            $table->string('ds_titulo', 100);
            $table->string('ds_texto_noticia', 800)->default('');
            $table->string('ds_link', 150)->default('');
            $table->string('ds_imagem', 100)->default('')->nullable();
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
		Schema::drop('home_page_temp');
	}
}

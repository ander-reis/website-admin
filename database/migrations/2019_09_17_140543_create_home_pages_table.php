<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateHomePagesTable.
 */
class CreateHomePagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_sinpro_admin_home_page', function(Blueprint $table) {
            $table->increments('id');
            $table->string('ds_categoria', 50);
            $table->string('ds_titulo', 100);
            $table->string('ds_texto_noticia', 800)->default('');
            $table->string('ds_link', 150)->default('');
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
		Schema::drop('tb_sinpro_admin_home_page');
	}
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateOrdemNoticiasTable.
 */
class CreateOrdemNoticiasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tb_sinpro_admin_ordem_noticias', function(Blueprint $table) {
            $table->integer('id_noticia');
            $table->integer('ordem_noticia');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tb_sinpro_admin_ordem_noticias');
	}
}

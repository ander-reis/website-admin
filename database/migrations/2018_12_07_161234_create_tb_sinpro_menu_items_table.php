<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSinproMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sinpro_menu_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label', 100);
            $table->string('link');
            $table->integer('parent')->default(0);
            $table->integer('sort')->default(0);
            $table->string('class_active')->nullable();
            $table->integer('menu');
            $table->integer('depth')->default(0);
            $table->integer('menu_custom')->nullable();
            $table->char('fl_status', 1)->default(1);
            $table->timestamps();

            $table->foreign('menu')->references('id')->on('tb_sinpro_menu')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_sinpro_menu_items');
    }
}

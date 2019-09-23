<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthenticationLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::connection('sqlsrv-website')->create('authentication_log', function (Blueprint $table) {
        Schema::connection('pgsql')->create('authentication_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('authenticatable');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('login_at')->nullable();
            $table->timestamp('logout_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::connection('sqlsrv-website')->dropIfExists('authentication_log');
        Schema::connection('pgsql')->dropIfExists('authentication_log');
    }
}

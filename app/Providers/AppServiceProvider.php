<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * configuração IDE Helper
         */
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        /**
         * Registra faker com a linguagem em portugues pt_BR
         */
        $this->app->extend(\Faker\Generator::class, function (){
            return \Faker\Factory::create('pt_BR');
        });
    }
}

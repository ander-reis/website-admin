<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\NoticiasRepository::class, \App\Repositories\NoticiasRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\NoticiasCategoriaRepository::class, \App\Repositories\NoticiasCategoriaRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SliderRepository::class, \App\Repositories\SliderRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\OwlCarouselRepository::class, \App\Repositories\OwlCarouselRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PaginasPrincipaisRepository::class, \App\Repositories\PaginasPrincipaisRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ConvencoesRepository::class, \App\Repositories\ConvencoesRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ConvencoesClausulasRepository::class, \App\Repositories\ConvencoesClausulasRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ConvencoesEntidadeRepository::class, \App\Repositories\ConvencoesEntidadeRepositoryEloquent::class);
        //:end-bindings:
    }
}

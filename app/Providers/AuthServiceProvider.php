<?php

namespace App\Providers;

use App\Auth\CustomUserProvider;
use App\Models\Convencoes;
use App\Models\Noticias;
use App\Policies\ConvencoesPolicy;
use App\Policies\NoticiasPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Noticias::class => NoticiasPolicy::class,
        Convencoes::class => ConvencoesPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**
         * registra provider personalizado de autenticação
         */
        \Auth::provider('custom-user', function ($app, array $config){
            return new CustomUserProvider($app['hash'], $config['model']);
        });

        /**
         * define acl para paginas
         */
        Gate::resource('noticias', 'App\Policies\NoticiasPolicy');
        Gate::resource('noticias-categoria', 'App\Policies\NoticiasCategoriaPolicy');
        Gate::resource('ordem-noticias', 'App\Policies\OrdemNoticiasPolicy');

        Gate::resource('convencoes', 'App\Policies\ConvencoesPolicy');
        Gate::resource('clausulas', 'App\Policies\ClausulasPolicy');
        Gate::resource('slider', 'App\Policies\SliderPolicy');
        Gate::resource('intro', 'App\Policies\IntroPolicy');
        Gate::resource('home-page', 'App\Policies\HomePagePolicy');
        Gate::resource('paginas-principais', 'App\Policies\PaginasPrincipaisPolicy');
        Gate::resource('boletim-cadastro', 'App\Policies\BoletimCadastroPolicy');
    }
}

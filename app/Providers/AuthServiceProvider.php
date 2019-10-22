<?php

namespace App\Providers;

use App\Auth\CustomUserProvider;
use App\Models\BoletimCadastro;
use App\Models\Convencoes;
use App\Models\ConvencoesClausulas;
use App\Models\HomePage;
use App\Models\Intro;
use App\Models\Noticias;
use App\Models\NoticiasCategoria;
use App\Models\OrdemNoticias;
use App\Models\PaginasPrincipais;
use App\Models\Slider;
use App\Policies\BoletimCadastroPolicy;
use App\Policies\ClausulasPolicy;
use App\Policies\ConvencoesPolicy;
use App\Policies\HomePagePolicy;
use App\Policies\IntroPolicy;
use App\Policies\NoticiasCategoriaPolicy;
use App\Policies\NoticiasPolicy;
use App\Policies\OrdemNoticiasPolicy;
use App\Policies\PaginasPrincipaisPolicy;
use App\Policies\SliderPolicy;
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
        NoticiasCategoria::class => NoticiasCategoriaPolicy::class,
        OrdemNoticias::class => OrdemNoticiasPolicy::class,
        Convencoes::class => ConvencoesPolicy::class,
        ConvencoesClausulas::class => ClausulasPolicy::class,
        Slider::class => SliderPolicy::class,
        Intro::class => IntroPolicy::class,
        HomePage::class => HomePagePolicy::class,
        PaginasPrincipais::class => PaginasPrincipaisPolicy::class,
        BoletimCadastro::class => BoletimCadastroPolicy::class
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

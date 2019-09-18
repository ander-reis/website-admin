<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/admin/dashboard');
});

/**
 * rota home
 */
Route::name('home')->get('/', function(){
    return redirect('/admin/dashboard');
});

/**
 * contém todas as rotas auth
 */
//Auth::routes();
/**
 * usando somente login e logout
 */
Route::name('login')->get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::name('logout')->post('logout', 'Auth\LoginController@logout');


Route::prefix('admin')->group(function(){
    Route::group([
        'as' => 'admin.',
        'namespace' => 'Admin\\',
        'middleware' => 'auth'
    ], function(){
        /**
         * dashboard admin
         */
        Route::name('dashboard')->get('/dashboard', 'Dashboard\DashboardController@index');

        /**
         * notícias
         */
        Route::resource('noticias', 'Noticias\NoticiasController');

        /**
         * ordem noticias
         */
        Route::resource('ordem-noticias', 'Noticias\OrdemNoticiasController', ['only' => ['index', 'store']]);

        /**
         * notícias categorias
         */
        Route::resource('noticias-categoria', 'Noticias\NoticiasCategoriasController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);

        /**
         * slider
         */
        Route::resource('slider', 'Slider\SlidersController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);

        /**
         * owl carousel
         */
        Route::resource('owl-carousel', 'OwlCarousel\OwlCarouselController', ['only' => ['index', 'edit', 'update']]);

        /**
         * páginas principais
         */
        Route::resource('paginas', 'PaginasPrincipais\PaginasPrincipaisController');

        /**
         * Home
         */
        Route::resource('home-page', 'HomePage\HomePageController');

        /**
         * rotas para download da slider/imagem no sistema
         */
        Route::name('slider.thumb_asset')->get('slider/{slider}/thumb_asset', 'Slider\SlidersController@thumbAsset');
        Route::name('slider.thumb_small_asset')->get('slider/{slider}/thumb_small_asset', 'Slider\SlidersController@thumbSmallAsset');

        /**
         * grupo convencoes e acordos
         */
        Route::group(['prefix' => 'convencoes-e-acordo'], function(){
            Route::name('convencao.index')->get('/{convencoes_entidade}', 'Convencoes\ConvencoesController@index');
            Route::name('convencao.create')->get('/{convencoes_entidade}/create', 'Convencoes\ConvencoesController@create');
            Route::name('convencao.store')->post('/store', 'Convencoes\ConvencoesController@store');
            Route::name('convencao.edit')->get('/{convencoes_entidade}/convencao/{convencoes}/edit', 'Convencoes\ConvencoesController@edit');
            Route::name('convencao.update')->put('/{convencoes}', 'Convencoes\ConvencoesController@update');
            Route::name('convencao.show')->get('/{convencoes_entidade}/convencao/{convencoes}/show', 'Convencoes\ConvencoesController@show');
            /**
             * rotas para download do pdf
             */
            Route::name('convencao.asset')->get('/pdf/{convencao}', 'Convencoes\ConvencoesController@convencaoAsset');
            Route::name('aditamento.asset')->get('/pdf-aditamento/{convencao}', 'Convencoes\ConvencoesController@aditamentoAsset');
            /**
             * claúsulas
             */
//            Route::resource('convencao.clausulas', 'Convencoes\ConvencoesClausulasController', ['only' => ['index', 'store', 'create', 'edit', 'update', 'destroy']]);
            Route::name('convencao.clausulas.index')->get('/{convencoes_entidade}/convencao/{convencoes}/clausulas', 'Convencoes\ConvencoesClausulasController@index');
            Route::name('convencao.clausulas.create')->get('/{convencoes_entidade}/convencao/{convencoes}/clausulas/create', 'Convencoes\ConvencoesClausulasController@create');
            Route::name('convencao.clausulas.store')->post('/{convencoes_entidade}/convencao/{convencoes}/clausulas', 'Convencoes\ConvencoesClausulasController@store');
            Route::name('convencao.clausulas.edit')->get('/{convencoes_entidade}/convencao/{convencoes}/clausulas/{clausula}/edit', 'Convencoes\ConvencoesClausulasController@edit');
            Route::name('convencao.clausulas.update')->put('/{convencoes_entidade}/convencao/{convencoes}/clausulas/{clausula}', 'Convencoes\ConvencoesClausulasController@update');
            Route::name('convencao.clausulas.destroy')->delete('/{convencoes_entidade}/convencao/{convencoes}', 'Convencoes\ConvencoesClausulasController@destroy');
        });

        /**
         * grupo configurações
         */
        Route::group(['prefix' => 'configuracoes'], function(){
//            Route::resource('rede-social', 'Configuracoes\RedesSociaisController');

        });
    });
});

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
    return view('auth.login');
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
        Route::resource('noticias', 'Noticias\NoticiasController', ['only' => ['index', 'store', 'create', 'edit', 'update']]);

        /**
         * notícias categorias
         */
        Route::resource('categorias', 'Noticias\NoticiasCategoriasController', ['only' => ['index', 'create', 'store', 'edit', 'update']]);

        /**
         *
         * RESOLVER PROBLEMA VER-NOTICIA NO SITE
         *
         */
        //Route::name('ver-noticia')->get('/ver-noticia/{noticia}', 'NoticiasController@verNoticia');

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
         * rotas para download da slider/imagem no sistema
         */
        Route::name('slider.thumb_asset')->get('slider/{slider}/thumb_asset', 'Slider\SlidersController@thumbAsset');
        Route::name('slider.thumb_small_asset')->get('slider/{slider}/thumb_small_asset', 'Slider\SlidersController@thumbSmallAsset');

        /**
         * menu
         */
        Route::group(['prefix' => 'menu'], function () {
            Route::name('menu')->get('/', 'MenuTree\MenuController@index');
            Route::name('haddcustommenu')->post('/addcustommenu', 'MenuTree\MenuController@addcustommenu');
            Route::name('hdeleteitemmenu')->post('/deleteitemmenu', 'MenuTree\MenuController@deleteitemmenu');
            Route::name('hdeletemenug')->post('/deletemenug','MenuTree\MenuController@deletemenug');
            Route::name('hcreatenewmenu')->post('/createnewmenu', 'MenuTree\MenuController@createnewmenu');
            Route::name('hgeneratemenucontrol')->post('/generatemenucontrol', 'MenuTree\MenuController@generatemenucontrol');
            Route::name('hupdateitem')->post('/updateitem', 'MenuTree\MenuController@updateitem');
        });

        /**
         * grupo convencoes e acordos
         */
        Route::group(['prefix' => 'convencoes-e-acordos'], function(){
            Route::name('convencao.index')->get('/{convencao}', 'Convencoes\ConvencoesController@index');
            Route::name('convencao.create')->get('/{convencao}/create', 'Convencoes\ConvencoesController@create');
            Route::name('convencao.store')->post('/store', 'Convencoes\ConvencoesController@store');
            Route::name('convencao.edit')->get('/{id}/edit', 'Convencoes\ConvencoesController@edit');
            Route::name('convencao.update')->put('/{id}', 'Convencoes\ConvencoesController@update');
            /**
             * rotas para download do pdf
             */
            Route::name('convencao.asset')->get('/pdf/{convencao}', 'Convencoes\ConvencoesController@convencaoAsset');
            Route::name('aditamento.asset')->get('/pdf-aditamento/{convencao}', 'Convencoes\ConvencoesController@aditamentoAsset');
            /**
             * claúsulas
             */
            Route::resource('convencao.clausulas', 'Convencoes\ConvencoesClausulasController', ['only' => ['index', 'store', 'create', 'edit', 'update', 'destroy']]);
        });
    });
});
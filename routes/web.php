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
    ], function(){
        /**
         * home admin
         */
        Route::get('/home', 'HomeController@index')->name('home');

        /**
         * notícias
         */
        //Route::resource('noticias', 'Noticias\NoticiasController', ['only' => ['index', 'store', 'create', 'edit', 'update']]);

    });
});
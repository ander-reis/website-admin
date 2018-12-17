<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

\ApiRoute::version('v1', function () {
    ApiRoute::group([
        'namespace' => 'App\Http\Controllers\Api',
        'as' => 'api',
        'middleware' => 'bindings'
    ], function () {
        //access token
        ApiRoute::post('/access_token', [
            'uses' => 'AuthController@accessToken',
            'middleware' => 'api.throttle',
            'limit' => 300,
            'expires' => 1
        ])->name('.access_token');

        //refresh token
        ApiRoute::post('/refresh_token', [
            'uses' => 'AuthController@refreshToken',
            'middleware' => 'api.throttle',
            'limit' => 100,
            'expires' => 1
        ])->name('.refresh_token');


        ApiRoute::group([
            'middleware' => ['api.throttle', 'auth.renew'],
            'limit' => 100,
            'expires' => 3],
            function () {
                //logout
                ApiRoute::post('/logout', 'AuthController@logout');

                // rota para test phpunit
                ApiRoute::get('/user', function (Request $request){
                    /**
                     * 3 metodos de exemplo para retonar user autenticado
                     */
                    return $request->user('api');
                    //return app(\Dingo\Api\Auth\Auth::class)->user();
                    //return \Auth::guard('api')->user();

                    //teste loading payment
                    //throw new \Exception('teste');
                });

                // rota noticias
                ApiRoute::resource('/noticias', 'NoticiasController', ['only' => ['index', 'store', 'show', 'update']]);

                // rota noticias categorias
                ApiRoute::resource('/noticias-categorias', 'NoticiasCategoriasController', ['only' => ['index', 'store', 'show', 'update']]);

                //rota para atualizar password
//                ApiRoute::patch('/user/settings', 'UsersController@updateSettings');

                /**
                 * Rota convencoes
                 */
                ApiRoute::resource('/convencoes-e-acordo', 'ConvencoesController', ['only' => ['index', 'store', 'show', 'update']]);

                /**
                 * Rota clausulas
                 */
                ApiRoute::resource('/clausulas', 'ClausulasController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
            });
    });
});

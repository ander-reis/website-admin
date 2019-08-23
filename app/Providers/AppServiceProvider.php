<?php

namespace App\Providers;

use App\Models\Convencoes;
use App\Models\Noticias;
use App\Transformers\CategoriaTransformer;
use App\Transformers\ConvencoesTransformer;
use Dingo\Api\Exception\Handler;
use Dingo\Api\Transformer\Factory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\AuthenticationException;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Validation\ValidationException;

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

        /**
         * Registra errors api
         */
        $handler = app(Handler::class);
        $handler->register(function(AuthenticationException $exception){
            return response()->json(['error' => 'Unauthenticated', 'status_code:' => 401], 401);
        });
        $handler->register(function(JWTException $exception){
            return response()->json(['error' => $exception->getMessage(), 'status_code:' => 401], 401);
        });
        $handler->register(function(ValidationException $exception){
            return response()->json([
                'error' => $exception->getMessage(),
                'validation_error' => $exception->validator->getMessageBag()->toArray(),
                'status_code:' => 422,
            ], 422);
        });
        $handler->register(function(\PDOException $exception){
            return response()->json([
                'error' => $exception->getMessage(),
                'error_code' => $exception->getCode(),
                'status_code:' => 401,
            ], 401);
        });

        /**
         * Registra transformer
         */
        app(Factory::class)->register(Convencoes::class, ConvencoesTransformer::class);
        app(Factory::class)->register(Noticias::class, CategoriaTransformer::class);
    }
}

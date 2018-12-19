<?php

namespace App\Providers;

use App\Models\Noticias;
use App\Transformers\NoticiasTransformer;
use Dingo\Api\Exception\Handler;
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
        $transformer = app(\Dingo\Api\Transformer\Factory::class);
        $transformer->setAdapter(function ($app){
            return new \Dingo\Api\Transformer\Adapter\Fractal(new \League\Fractal\Manager(), 'include', ',', false);
        });
//        $transformer->register(Convencoes::class, ConvencoesTransformer::class);
        $transformer->register(Noticias::class, NoticiasTransformer::class);
    }
}

<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\PaginasPrincipais::class, function (Faker $faker) {
    return [
        'ds_texto' => $faker->text(100),
        'ds_palavra_chave' => $faker->sentence(rand(1, 3)),
    ];
});

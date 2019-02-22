<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\ConvencoesClausulas::class, function (Faker $faker) {
    return [
        'num_clausula' => $faker->unique()->numberBetween(1, 20),
        'ds_titulo' => $faker->text(rand(30, 150)),
        'ds_texto' => $faker->text(rand(50, 100)),
        'ds_palavra_chave' => $faker->word . ',' . $faker->word,
        'fl_ativo' => 1
    ];
});

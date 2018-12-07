<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\PaginasPrincipais::class, function (Faker $faker) {
    return [
        'tp_busca' => 1,
        'txt_titulo_busca' => $faker->sentence(3),
        'ds_texto' => $faker->word,
        'ds_palavra_chave' => $faker->word,
        'fl_status' => 1
    ];
});

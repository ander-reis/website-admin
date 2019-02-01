<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\PaginasPrincipais::class, function (Faker $faker) {
    return [
        'tp_busca' => 1,
        'txt_titulo_busca' => $faker->sentence(3),
        'txt_pagina' => $faker->text(rand(150, 500)),
        'ds_palavra_chave' => $faker->word,
        'fl_status' => 1
    ];
});

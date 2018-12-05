<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Noticias::class, function (Faker $faker) {
    return [
        'dt_noticia' => $faker->dateTime('now', 'UTC'),
        'fl_exibir_destaque' => rand(0, 1),
        'ds_resumo' => $faker->text(80),
        'ds_texto' => $faker->sentence(rand(10, 30)),
        'ds_palavra_chave' => "$faker->word, $faker->city, $faker->name",
        'fl_oculta' => rand(0, 1)
    ];
});

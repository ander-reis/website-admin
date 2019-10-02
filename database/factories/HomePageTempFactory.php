<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\HomePageTemp::class, function (Faker $faker) {
    return [
        'ds_categoria' => $faker->word,
        'ds_titulo' => $faker->word,
        'ds_texto_noticia' => $faker->sentence,
        'ds_link' => $faker->word,
    ];
});

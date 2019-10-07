<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Slider::class, function (Faker $faker) {
    return [
        'ds_label' => $faker->text(30),
        'ds_titulo' => $faker->text(70),
        'ds_imagem' => 'slider_001.jpg',
        'ds_link' => $faker->text(60),
        'fl_ordem' => rand(0, 1),
        'fl_ativo' => rand(0, 1)
    ];
});

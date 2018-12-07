<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Slider::class, function (Faker $faker) {
    return [
        'ds_label' => $faker->text(15),
        'ds_titulo' => $faker->text(30),
        'ds_imagem' => 'slider_001.jpg',
        'ds_link' => $faker->url,
        'fl_ativo' => rand(0, 1)
    ];
});

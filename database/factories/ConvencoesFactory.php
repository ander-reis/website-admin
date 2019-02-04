<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Convencoes::class, function (Faker $faker) {
    return [
        'ds_titulo' => $faker->text(100),
        'dt_validade' => $faker->year('now'),
        'ds_titulo_aditamento' => $faker->text(100),
        'fl_app' => '1',
        'fl_ativo' => 'S',
    ];
});

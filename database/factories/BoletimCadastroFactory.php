<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\BoletimCadastro::class, function (Faker $faker) {
    return [
        'id_boletim' => $faker->randomNumber(2),
        'dt_boletim' => $faker->dateTime(),
        'ds_destaque' => $faker->word(),
        'ds_link' => 'http://' . $faker->text(80),
        'ds_tag' => $faker->text(100),
        'dt_cadastro' => $faker->dateTime('now'),
    ];
});

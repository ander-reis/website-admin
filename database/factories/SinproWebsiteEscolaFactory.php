<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\EscolaWebsite::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'escola' => $faker->name,
        'endereco' => $faker->address,
        'telefone' => $faker->phoneNumber
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\EscolaMeses::class, function (Faker $faker) {
    static $index = 1;
    return [
        'num_mes' => $index++,
        'num_ano' => 2019
    ];
});

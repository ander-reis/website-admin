<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\OrdemNoticias::class, function (Faker $faker) {
    static $index = 0;
    return [
        'ordem_noticia' => $index++
    ];
});

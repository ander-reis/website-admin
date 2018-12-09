<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\UsersWebsite::class, function (Faker $faker) {
    return [
        'name' => 'User Site',
        'email' => 'user@user.com',
        'matricula' => '11.000',
        'cpf' => '278.193.468-25',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

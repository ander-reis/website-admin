<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\CurriculosProfessores::class, function (Faker $faker) {
    return [
        'ds_cpf' => $faker->cpf,
        'ds_nome' => $faker->name,
        'ds_sexo' => $faker->randomElement(['M', 'F']),
        'int_estado_civil' => rand(1, 5),
        'dt_data_nasc' => $faker->dateTime,
        'ds_cidade' => $faker->city,
        'ds_estado' => 'SP',
        'ds_pais' => 'Brasil',
        'email' => $faker->email,
        'ds_fone' => $faker->landline,
        'ds_celular' => $faker->cellphone,
        'ds_salario' => $faker->numberBetween(1, 1000),
        'int_empregado' => rand(0, 1),
        'int_disp_horario' => rand(0, 1),
        'int_disp_cidade' => rand(0, 1),
        'int_formacao' => $faker->numberBetween(1, 6),
        'int_disciplina' => $faker->numberBetween(1, 36),
        'int_nivel_atuacao' => $faker->numberBetween(1, 10),
        'ds_objetivo' => $faker->text(rand(50, 100)),
        'ds_qualificacao' => $faker->text(rand(30, 50)),
        'ds_experiencia' => $faker->text(rand(10, 20)),
        'password' => bcrypt('secret'),
        'int_ativo' => 1,
    ];
});

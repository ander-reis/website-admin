<?php

use Illuminate\Database\Seeder;

class NoticiasCategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Avaliação Postural'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Campanha Salarial'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Canal Afro-brasil'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Colônia de Férias'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Convênios'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Cursos'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Direitos'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'EaD'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Educação Básica'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Ensino Superior'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Eventos'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Geral'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Mackenzie'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Pós-graduação'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Sesi/Senai'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Uniban'
        ]);

        factory(\App\Models\NoticiasCategoria::class)->create([
            'ds_categoria' => 'Voz do Professor'
        ]);
    }
}

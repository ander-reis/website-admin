<?php

use Illuminate\Database\Seeder;

class ConvencoesEntidadeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\ConvencoesEntidade::class)->create([
            'ds_entidade' => 'Ensino Superior'
        ]);

        factory(\App\Models\ConvencoesEntidade::class)->create([
            'ds_entidade' => 'Educação Básica'
        ]);

        factory(\App\Models\ConvencoesEntidade::class)->create([
            'ds_entidade' => 'Sesi'
        ]);

        factory(\App\Models\ConvencoesEntidade::class)->create([
            'ds_entidade' => 'Senai'
        ]);

        factory(\App\Models\ConvencoesEntidade::class)->create([
            'ds_entidade' => 'Senai Superior'
        ]);

        factory(\App\Models\ConvencoesEntidade::class)->create([
            'ds_entidade' => 'Senac'
        ]);

        factory(\App\Models\ConvencoesEntidade::class)->create([
            'ds_entidade' => 'Ensino Supletivo'
        ]);

        factory(\App\Models\ConvencoesEntidade::class)->create([
            'ds_entidade' => 'Mackenzie'
        ]);

        factory(\App\Models\ConvencoesEntidade::class)->create([
            'ds_entidade' => 'PUC-SP'
        ]);
    }
}

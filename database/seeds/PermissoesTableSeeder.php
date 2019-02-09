<?php

use Illuminate\Database\Seeder;

class PermissoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Permissoes::class)->create([
            'id_usuario' => 1,
            'id_pagina' => 1,
            'fl_consulta' => 1,
            'fl_cadastro' => 1,
            'fl_alteracao' => 1,
            'fl_exclusao' => 1
        ]);

        factory(\App\Models\Permissoes::class)->create([
            'id_usuario' => 2,
            'id_pagina' => 1,
            'fl_consulta' => 0,
            'fl_cadastro' => 0,
            'fl_alteracao' => 0,
            'fl_exclusao' => 0
        ]);

        factory(\App\Models\Permissoes::class)->create([
            'id_usuario' => 2,
            'id_pagina' => 21,
            'fl_consulta' => 0,
            'fl_cadastro' => 1,
            'fl_alteracao' => 0,
            'fl_exclusao' => 0
        ]);
    }
}

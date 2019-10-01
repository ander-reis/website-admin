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
        factory(App\Models\Permissoes::class)->create([
            'id_usuario' => 1,
            'id_pagina' => 1,
            'fl_consulta' => 1,
            'fl_cadastro' => 1,
            'fl_alteracao' => 1,
            'fl_exclusao' => 1
        ]);

        factory(App\Models\Permissoes::class)->create([
            'id_usuario' => 1,
            'id_pagina' => 21,
            'fl_consulta' => 1,
            'fl_cadastro' => 1,
            'fl_alteracao' => 1,
            'fl_exclusao' => 1
        ]);

        factory(App\Models\Permissoes::class)->create([
            'id_usuario' => 1,
            'id_pagina' => 25,
            'fl_consulta' => 1,
            'fl_cadastro' => 1,
            'fl_alteracao' => 1,
            'fl_exclusao' => 1
        ]);

        factory(App\Models\Permissoes::class)->create([
            'id_usuario' => 1,
            'id_pagina' => 26,
            'fl_consulta' => 1,
            'fl_cadastro' => 1,
            'fl_alteracao' => 1,
            'fl_exclusao' => 1
        ]);

        factory(App\Models\Permissoes::class)->create([
            'id_usuario' => 1,
            'id_pagina' => 27,
            'fl_consulta' => 1,
            'fl_cadastro' => 1,
            'fl_alteracao' => 1,
            'fl_exclusao' => 1
        ]);

        factory(App\Models\Permissoes::class)->create([
            'id_usuario' => 1,
            'id_pagina' => 28,
            'fl_consulta' => 1,
            'fl_cadastro' => 1,
            'fl_alteracao' => 1,
            'fl_exclusao' => 1
        ]);

        factory(App\Models\Permissoes::class)->create([
            'id_usuario' => 1,
            'id_pagina' => 29,
            'fl_consulta' => 1,
            'fl_cadastro' => 1,
            'fl_alteracao' => 1,
            'fl_exclusao' => 1
        ]);
    }
}

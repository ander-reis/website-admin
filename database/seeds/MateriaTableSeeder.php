<?php

use Illuminate\Database\Seeder;

class MateriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 1, 'Materia' => 'ADMINISTRAÇÃO'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 2, 'Materia' => 'ALFABETIZAÇÃO'
            ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 3, 'Materia' => 'ANTROPOLOGIA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 4, 'Materia' => 'ARQUITETURA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 5, 'Materia' => 'BIOLOGIA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 6, 'Materia' => 'BIBLIOTECONOMIA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 7, 'Materia' => 'CIÊNCIAS'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 8, 'Materia' => 'CIÊNCIAS JURÍDICA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 9, 'Materia' => 'CIÊNCIAS MÉDICAS'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 10, 'Materia' => 'CIÊNCIAS SOCIAIS'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 11, 'Materia' => 'DIDÁTICAS'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 12, 'Materia' => 'ECONOMIA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 13, 'Materia' => 'EDUCAÇÃO ARTÍSTICA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 14, 'Materia' => 'EDUCAÇÃO FÍSICA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 15, 'Materia' => 'EDUCAÇÃO MUSICAL'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 16, 'Materia' => 'ENGENHARIA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 17, 'Materia' => 'FILOSOFIA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 18, 'Materia' => 'FÍSICA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 19, 'Materia' => 'GEOGRAFIA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 20, 'Materia' => 'HISTÓRIA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 21, 'Materia' => 'LÍNGUA ESTRANGERIA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 22, 'Materia' => 'LÍNGUA PORTUGUESA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 23, 'Materia' => 'MAGISTÉRIO'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 24, 'Materia' => 'MATEMÁTICA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 25, 'Materia' => 'POLIVALENTE'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 26, 'Materia' => 'PSICOLOGIA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 27, 'Materia' => 'PUBLICIDADE'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 28, 'Materia' => 'QUÍMICA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 29, 'Materia' => 'RELIGIÃO'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 30, 'Materia' => 'SERVIÇO SOCIAL'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 31, 'Materia' => 'TÉCNICO'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 32, 'Materia' => 'INFORMÁTICA E COMPUTAÇÃO'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 33, 'Materia' => 'COMUNICAÇÃO SOCIAL'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 34, 'Materia' => 'PEDAGOGIA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 35, 'Materia' => 'EDUCAÇÃO ESPECIAL'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 36, 'Materia' => 'DANÇA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 37, 'Materia' => 'TURISMO'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 38, 'Materia' => 'LOGÍSTICA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 40, 'Materia' => 'NUTRIÇÃO'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 42, 'Materia' => 'FOTOGRAFIA'
        ]);

        factory(\App\Models\Materia::class)->create([
            'Codigo_Materia' => 43, 'Materia' => 'LIBRAS'
        ]);
    }
}

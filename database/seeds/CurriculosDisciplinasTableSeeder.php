<?php

use Illuminate\Database\Seeder;

class CurriculosDisciplinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Adminitração']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Alfabetização']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Antropologia']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Arquitetura']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Biologia']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Biblioteconomia']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Ciências']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Ciências Jurídicas']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Ciências Médicas']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Ciências Sociais']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Didáticas']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Economia']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Educação Artística']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Educação Física']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Educação Musical']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Engenharia']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Filosofia']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Física']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Geografia']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'História']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Língua Estrangeira']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Língua Portuguesa']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Magistério']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Matemática']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Polivalente']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Psicologia']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Publicidade']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Química']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Religião']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Serviço Social']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Técnico']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Informática e Computação']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Comunicação Social']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Ciências Contábeis']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Dança']);
        factory(\App\Models\CurriculosDisciplinas::class)->create(['ds_disciplina' => 'Teatro/Arte']);
    }
}

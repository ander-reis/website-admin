<?php

use Illuminate\Database\Seeder;

class PaginasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Notícias',
            'url_pagina' => 'noticias'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Guia de Consultas',
            'url_pagina' => 'guiaconsultas'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Home',
            'url_pagina' => 'home'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Atendimento on-lin',
            'url_pagina' => 'atendimento'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Acontece',
            'url_pagina' => 'acontence'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Opinião da Diretoria',
            'url_pagina' => 'opiniao'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Conteúdo Geral',
            'url_pagina' => 'geral'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Acesso Rápido',
            'url_pagina' => 'acessorapido'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Destaque Flash',
            'url_pagina' => 'destaque'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Forúm',
            'url_pagina' => 'forum'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Inscricao Colônia de Férias - SINPRO Osasco',
            'url_pagina' => 'colonia_naosindicalizado'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Educação na Imprensa',
            'url_pagina' => 'educacao_imprensa'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Reportagens e Entrevistas',
            'url_pagina' => 'reportagem_entrevista'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Multimídia',
            'url_pagina' => 'multimidia'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Redirecionamento',
            'url_pagina' => 'redirecionamento'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Convêncios Diversos',
            'url_pagina' => 'convenios_diversos'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Denúncia Gestantes',
            'url_pagina' => 'denuncia_gestante'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Sala dos Professores',
            'url_pagina' => 'saladosprofessores'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'RSS',
            'url_pagina' => 'rss'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Cursos',
            'url_pagina' => 'cursos_meses'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Convênções Coletivas',
            'url_pagina' => 'convencoes'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'RSS - Revista Giz',
            'url_pagina' => 'rss_revistagiz'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Avaliação CONPEB',
            'url_pagina' => 'avaliacao_conpeb'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Baile dos Professores',
            'url_pagina' => 'baile_professor'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Slider',
            'url_pagina' => 'slider'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Owl Carousel',
            'url_pagina' => 'owl-carousel'
        ]);
    }
}

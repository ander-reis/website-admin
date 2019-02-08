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
            'url_pagina' => 'noticias.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Guia de Consultas',
            'url_pagina' => 'guiaconsultas.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Home',
            'url_pagina' => 'home.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Atendimento on-lin',
            'url_pagina' => 'atendimento.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Acontece',
            'url_pagina' => 'acontence.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Opinião da Diretoria',
            'url_pagina' => 'opiniao.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Conteúdo Geral',
            'url_pagina' => 'geral.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Acesso Rápido',
            'url_pagina' => 'acessorapido.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Destaque Flash',
            'url_pagina' => 'destaque.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Forúm',
            'url_pagina' => 'forum.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Inscricao Colônia de Férias - SINPRO Osasco',
            'url_pagina' => 'colonia_naosindicalizado.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Educação na Imprensa',
            'url_pagina' => 'educacao_imprensa.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Reportagens e Entrevistas',
            'url_pagina' => 'reportagem_entrevista.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Multimídia',
            'url_pagina' => 'multimidia.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Redirecionamento',
            'url_pagina' => 'redirecionamento.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Convêncios Diversos',
            'url_pagina' => 'convenios_diversos.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Denúncia Gestantes',
            'url_pagina' => 'denuncia_gestante.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Sala dos Professores',
            'url_pagina' => 'saladosprofessores.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'RSS',
            'url_pagina' => 'rss.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Cursos',
            'url_pagina' => 'cursos_meses.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Convênções Coletivas',
            'url_pagina' => 'convencoes.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'RSS - Revista Giz',
            'url_pagina' => 'rss_revistagiz.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Avaliação CONPEB',
            'url_pagina' => 'avaliacao_conpeb.asp'
        ]);

        factory(\App\Models\Paginas::class)->create([
            'ds_pagina' => 'Baile dos Professores',
            'url_pagina' => 'baile_professor.asp'
        ]);
    }
}

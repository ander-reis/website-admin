<?php

use Illuminate\Database\Seeder;

class PaginasPrincipaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Guia de Consultas',
            'txt_titulo' => 'Guia de Consultas',
            'url' => 'guiaconsultas',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Home',
            'txt_titulo' => 'Home',
            'url' => 'home',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Atendimento on-lin',
            'txt_titulo' => 'Atendimento on-lin',
            'url' => 'atendimento',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Acontece',
            'txt_titulo' => 'Acontece',
            'url' => 'acontence'
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Opinião da Diretoria',
            'txt_titulo' => 'Opinião da Diretoria',
            'url' => 'opiniao',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Conteúdo Geral',
            'txt_titulo' => 'Conteúdo Geral',
            'url' => 'geral',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Acesso Rápido',
            'txt_titulo' => 'Acesso Rápido',
            'url' => 'acessorapido',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Destaque Flash',
            'txt_titulo' => 'Destaque Flash',
            'url' => 'destaque',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Forúm',
            'txt_titulo' => 'Forúm',
            'url' => 'forum',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Inscricao Colônia de Férias - SINPRO Osasco',
            'txt_titulo' => 'Inscricao Colônia de Férias - SINPRO Osasco',
            'url' => 'colonia_naosindicalizado',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Educação na Imprensa',
            'txt_titulo' => 'Educação na Imprensa',
            'url' => 'educacao_imprensa',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Reportagens e Entrevistas',
            'txt_titulo' => 'Reportagens e Entrevistas',
            'url' => 'reportagem_entrevista',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Multimídia',
            'txt_titulo' => 'Multimídia',
            'url' => 'multimidia',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Redirecionamento',
            'txt_titulo' => 'Redirecionamento',
            'url' => 'redirecionamento'
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Convêncios Diversos',
            'txt_titulo' => 'Convêncios Diversos',
            'url' => 'convenios_diversos',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Denúncia Gestantes',
            'txt_titulo' => 'Denúncia Gestantes',
            'url' => 'denuncia_gestante',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Sala dos Professores',
            'txt_titulo' => 'Sala dos Professores',
            'url' => 'saladosprofessores',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'RSS',
            'txt_titulo' => 'RSS',
            'url' => 'rss',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Cursos',
            'txt_titulo' => 'Cursos',
            'url' => 'cursos_meses',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Convênções Coletivas',
            'txt_titulo' => 'Convênções Coletivas',
            'url' => 'convencoes',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'RSS - Revista Giz',
            'txt_titulo' => 'RSS - Revista Giz',
            'url' => 'rss_revistagiz',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Avaliação CONPEB',
            'txt_titulo' => 'Avaliação CONPEB',
            'url' => 'avaliacao_conpeb',
        ]);

        factory(\App\Models\PaginasPrincipais::class)->create([
            'txt_titulo_busca' => 'Baile dos Professores',
            'txt_titulo' => 'Baile dos Professores',
            'url' => 'baile_professor',
        ]);

//        factory(\App\Models\PaginasPrincipais::class)->create([
//            'txt_titulo_busca' => 'Processos',
//            'txt_titulo' => 'Processos',
//            'url' => 'processos',
//        ]);
    }
}

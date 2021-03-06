<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(NoticiasCategoriasTableSeeder::class);
        $this->call(NoticiasTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(OwlCarouselTableSeeder::class);
        $this->call(ConvencoesEntidadeTableSeeder::class);
        $this->call(ConvencoesTableSeeder::class);
        $this->call(ConvencoesClausulasTableSeeder::class);
        $this->call(PaginasPrincipaisTableSeeder::class);
        $this->call(PermissoesTableSeeder::class);
        $this->call(HomePageTableSeeder::class);
        $this->call(HomePageTempTableSeeder::class);
        $this->call(BoletimCadastroTableSeeder::class);
        $this->call(OrdemNoticiaTableSeeder::class);
        $this->call(EscolaMesesTableSeeder::class);
        $this->call(CurriculosDisciplinasTableSeeder::class);
        $this->call(CurriculosFormacaoTableSeeder::class);
        $this->call(CurriculosNivelAtuacaoTableSeeder::class);
        $this->call(CurriculosProfessoresTableSeeder::class);
    }
}

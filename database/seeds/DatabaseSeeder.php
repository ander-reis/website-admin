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
        $this->call(ConteudoPaginasPrincipaisTableSeeder::class);
        $this->call(ConvencoesEntidadeTableSeeder::class);
        $this->call(ConvencoesTableSeeder::class);
        $this->call(ConvencoesClausulasTableSeeder::class);
        $this->call(SinproWebsiteEscolaTableSeeder::class);
        $this->call(CadastroProfessoresTableSeeder::class);
        $this->call(MateriaTableSeeder::class);
        $this->call(CepSPTableSeeder::class);
    }
}

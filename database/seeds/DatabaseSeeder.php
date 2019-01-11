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
        $this->call(MenuTreeTableSeeder::class);
        $this->call(MenuCategoriasTableSeeder::class);
        $this->call(MenuTreeItemsTableSeeder::class);
        $this->call(ConvencoesEntidadeTableSeeder::class);
        $this->call(ConvencoesTableSeeder::class);
        $this->call(ConvencoesClausulasTableSeeder::class);
        $this->call(SinproWebsiteUserTableSeeder::class);
        $this->call(SinproWebsiteEscolaTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Seeder;

class MenuCategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\MenuCategorias::class)->create([
            'label' => 'Conteúdo Geral',
            'class_active' => 'paginas.*'
        ]);

        factory(\App\Models\MenuCategorias::class)->create([
            'label' => 'Notícias',
            'class_active' => 'noticias.*'
        ]);

        factory(\App\Models\MenuCategorias::class)->create([
            'label' => 'Conveçoes e Acordo',
            'class_active' => 'convencao.*'
        ]);
    }
}

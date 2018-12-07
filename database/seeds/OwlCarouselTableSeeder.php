<?php

use Illuminate\Database\Seeder;

class OwlCarouselTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\OwlCarousel::class)->create([
            'ds_icone' => '<i class="fa fa-bar-chart" aria-hidden="true">&nbsp;</i>',
            'ds_titulo' => "Ranking <br>de Salários",
            'ds_link' => '#'
        ]);

        factory(\App\Models\OwlCarousel::class)->create([
            'ds_icone' => '<i class="fa fa-gavel" aria-hidden="true">&nbsp;</i>',
            'ds_titulo' => "Direitos dos <br> Professores",
            'ds_link' => '#'
        ]);

        factory(\App\Models\OwlCarousel::class)->create([
            'ds_icone' => '<i class="fa fa-line-chart" aria-hidden="true">&nbsp;</i>',
            'ds_titulo' => "Reajustes e <br> Piso Salarial",
            'ds_link' => '#'
        ]);

        factory(\App\Models\OwlCarousel::class)->create([
            'ds_icone' => '<i class="fa fa-handshake-o" aria-hidden="true">&nbsp;</i>',
            'ds_titulo' => "Campanha <br> Salarial",
            'ds_link' => '#'
        ]);

        factory(\App\Models\OwlCarousel::class)->create([
            'ds_icone' => '<i class="fa fa-university" aria-hidden="true">&nbsp;</i>',
            'ds_titulo' => "Congressos <br>e Cursos",
            'ds_link' => '#'
        ]);
    }
}

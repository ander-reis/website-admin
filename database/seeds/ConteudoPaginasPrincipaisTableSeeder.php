<?php

use Illuminate\Database\Seeder;

class ConteudoPaginasPrincipaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $paginas = factory(\App\Models\PaginasPrincipais::class, 50)->make();
        $paginas->each(function(\App\Models\PaginasPrincipais $model) use($faker){
            $model->txt_titulo = $faker->sentence(3);
            $txt_titulo = $model->txt_titulo;
            $url_pagina = $this->tratar($txt_titulo);
            $model->url_pagina = $url_pagina;
            $model->save();
        });

    }

    protected function tratar($string)
    {
        $string = substr($string,0,-1);
        $string = strtolower($string);
        $string = str_replace(" ", '-', $string);
        return $string;
    }
}

<?php

use Illuminate\Database\Seeder;

class NoticiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $noticiaCategoriaId = \App\Models\NoticiasCategoria::all();
        $noticias = factory(\App\Models\Noticias::class, 50)->make();
        $noticias->each(function(\App\Models\Noticias $model) use($noticiaCategoriaId){
            $id = $noticiaCategoriaId->random()->id_categoria;
            $model->categoria()->associate($id)->save();
        });
    }
}

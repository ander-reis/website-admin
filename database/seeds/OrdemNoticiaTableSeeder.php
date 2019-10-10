<?php

use Illuminate\Database\Seeder;

class OrdemNoticiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $noticias = \App\Models\Noticias::all();
        $ordemNoticia = factory(\App\Models\OrdemNoticias::class, 4)->create();

        $ordemNoticia->each(function(\App\Models\OrdemNoticias $model) use ($noticias){
            $noticiaId = $noticias->random()->id;
            $model->id_noticia = $noticiaId;
            $model->save();
        });
    }
}

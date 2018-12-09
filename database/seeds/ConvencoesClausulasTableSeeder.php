<?php

use Illuminate\Database\Seeder;

class ConvencoesClausulasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $convencoesId = \App\Models\Convencoes::all();

        $clausulas = factory(\App\Models\ConvencoesClausulas::class, 20)->make();
        $id = $convencoesId->random()->id;
        $clausulas->each(function(\App\Models\ConvencoesClausulas $model) use($id){
            $model->convencao()->associate($id)->save();
        });
    }
}

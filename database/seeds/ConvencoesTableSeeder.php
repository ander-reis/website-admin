<?php

use Illuminate\Database\Seeder;

class ConvencoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidadesId = \App\Models\ConvencoesEntidade::all();

        $convencoes = factory(\App\Models\Convencoes::class, 10)->make();

        $repository = app(\App\Repositories\ConvencoesRepository::class);
        $collectionConvencoes = $this->getConvencoes();
        $collectionConvencoesAditamento = $this->getConvencoes();

        $convencoes->each(function(\App\Models\Convencoes $model) use ($entidadesId, $repository, $collectionConvencoes, $collectionConvencoesAditamento){

            $id_entidades = $entidadesId->random()->id;
            $model->entidade()->associate($id_entidades)->save();

            $repository->uploadConvencao($model->id_convencao, $collectionConvencoes->random());

            $repository->uploadConvencaoAditamento($model->id_convencao, $collectionConvencoesAditamento->random());
        });
    }

    /**
     * Pega pdf de exemplo da pasta file/faker para executar o upload
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getConvencoes()
    {
        return new \Illuminate\Support\Collection([
            new \Illuminate\Http\UploadedFile(
                storage_path('app/files/faker/convencao/pdf_001.pdf'),
                'pdf_001.pdf'
            ),

            /**
             * se houver outras imagens para teste é só incluir no array
             */
            //new \Illuminate\Http\UploadedFile(
            //storage_path('app/files/faker/slider/slider_001.jpg'),
            //'slider_001.jpg'
            //)
        ]);
    }
}

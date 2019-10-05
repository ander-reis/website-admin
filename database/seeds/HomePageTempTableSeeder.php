<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class HomePageTempTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * exclui o diretorio de imagens toda vez que executa o seeder
         */
        $rootPath = config('filesystems.disks.upload_local.root');
        \File::deleteDirectory($rootPath, true);

        $ds_categorias = App\Models\NoticiasCategoria::all();

        /** @var Collection $slider */
        $image = factory(\App\Models\HomePageTemp::class, 8)->create();
        $repository = app(\App\Repositories\HomePageTempRepository::class);
        $collectionImage = $this->getImage();

        $image->each(function($model) use($repository, $collectionImage, $ds_categorias){
            $categoria = $ds_categorias->random()->ds_categoria;
            $model->ds_categoria = $categoria;
            $model->save();

            if($model->id === 8){
                $repository->uploadImagemRevistaGizTemp($model->id, $collectionImage->random());
            }
        });
    }

    /**
     * Pega imagem de exemplo da pasta file/faker para executar o upload
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getImage()
    {
        return new \Illuminate\Support\Collection([
            new \Illuminate\Http\UploadedFile(
                storage_path('app/files/faker/slider/slider_001.jpg'),
                'slider_001.jpg'
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

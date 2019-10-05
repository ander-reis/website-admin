<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class HomePageTableSeeder extends Seeder
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
        $homePage = factory(\App\Models\HomePage::class, 8)->create();
        $repository = app(\App\Repositories\HomePageRepository::class);
        $collectionImage = $this->getImage();

        $homePage->each(function(\App\Models\HomePage $model) use($repository, $collectionImage, $ds_categorias){
            $categoria = $ds_categorias->random()->ds_categoria;
            $model->ds_categoria = $categoria;
            $model->save();

            if($model->id === 8){
                $repository->uploadImagemRevistaGiz($model->id, $collectionImage->random());
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

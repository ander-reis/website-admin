<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
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

        /** @var Collection $slider */
        $sliders = factory(\App\Models\Slider::class, 1)->create();
        $repository = app(\App\Repositories\SliderRepository::class);
        $collectionSliders = $this->getSliders();

        $sliders->each(function($slider) use($repository, $collectionSliders){
            $repository->uploadSlider($slider->id, $collectionSliders->random());
        });
    }

    /**
     * Pega imagem de exemplo da pasta file/faker para executar o upload
     *
     * @return \Illuminate\Support\Collection
     */
    protected function getSliders()
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

<?php

namespace App\Traits;


use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;
use Imagine\Image\Box;

trait SliderUploads
{
    /**
     * Chama o model
     *
     * @param $id
     * @param UploadedFile $file
     * @return mixed
     */
    public function uploadSlider($id, UploadedFile $file)
    {
        $model = $this->find($id);
        $name = $this->upload($model, $file);
        if($name){
            /**
             * verifica se existe arquivo e deleta
             */
            $this->deleteThumbOld($model);

            $model->ds_imagem = $name;

            /**
             * cria slider da imagem com tamanho 980x380
             */
            $this->makeSlider($model);

            /**
             * criar thumbnail da imagem
             */
            $this->makeSliderSmall($model);

            $model->save();
        }
        return $model;
    }

    /**
     * Faz upload da imagem no storage
     *
     * @param $model
     * @param UploadedFile $file
     * @return false|string
     */
    public function upload($model, UploadedFile $file)
    {
        /** @var FilesystemAdapter $storage */
        $storage = $model->getStorage();
        //cria nome para imagem
        $name = md5(time() . "{$model->id}-{$file->getClientOriginalName()}") . ".{$file->guessExtension()}";
        //faz upload
        $result = $storage->putFileAs($model->slider_folder_storage, $file, $name);
        //retorna nome com sucesso ou resultado de erro
        return $result ? $name : $result;
    }

    public function makeSlider($model)
    {
        /**
         * pega storage
         */
        $storage = $model->getStorage();
        /**
         * pega arquivo
         */
        $sliderFile = $model->slider_path;
        /**
         * pega formato do arquivo
         */
        $format = \Image::format($sliderFile);
        /**
         * abre a imagem e gera o arquivo
         */
        $sliderImage = \Image::open($sliderFile)->thumbnail(new Box(980, 380));
        /**
         * envia o arquivo para o local e formato
         */
        $storage->put($model->slider_relative, $sliderImage->get($format));
    }

    /**
     * Cria thumbnail
     *
     * @param $model
     */
    protected function makeSliderSmall($model)
    {
        /**
         * pega storage
         */
        $storage = $model->getStorage();
        /**
         * pega arquivo
         */
        $sliderFile = $model->slider_path;
        /**
         * pega formato do arquivo
         */
        $format = \Image::format($sliderFile);
        /**
         * abre a imagem e gera o arquivo
         */
        $thumbnailSmall = \Image::open($sliderFile)->thumbnail(new Box(64, 36));
        /**
         * envia o arquivo para o local e formato
         */
        $storage->put($model->slider_small_relative, $thumbnailSmall->get($format));
    }

    /**
     * Deleta imagem da pasta de upload
     *
     * @param $model
     */
    public function deleteThumbOld($model)
    {
        /** @var FilesystemAdapter $storage */
        $storage = $model->getStorage();
        /**
         * verifica se imagem existe na pasta na hora da edição
         */
        if($storage->exists($model->slider_relative)){
            $storage->delete([$model->slider_relative, $model->slider_small_relative]);
        }
    }

    /**
     * Deleta a pasta em caso de exclusão
     *
     * @param $id
     * @return mixed
     */
    public function deleteSlider($id)
    {
        $model = $this->find($id);

        if($model){
            /**
             * Deleta do database
             */
            $this->delete($id);

            /** @var FilesystemAdapter $storage */
            $storage = $model->getStorage();
            /**
             * verifica se a pasta existe
             */
            if($storage->exists($model->slider_relative)){
                $storage->deleteDirectory($model->slider_folder_storage);
            }
        }
        return $model;
    }
}
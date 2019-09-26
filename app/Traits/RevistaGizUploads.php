<?php

namespace App\Traits;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;
use Imagine\Image\Box;

trait RevistaGizUploads
{
    /**
     * Chama o model
     *
     * @param $id
     * @param UploadedFile $file
     * @return mixed
     */
    public function uploadRevistaGiz($id, UploadedFile $file)
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
            $this->makeUpload($model);

            /**
             * criar thumbnail da imagem
             */
//            $this->makeSliderSmall($model);

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
        $result = $storage->putFileAs($model->revista_giz_folder_storage, $file, $name);
        //retorna nome com sucesso ou resultado de erro
        return $result ? $name : $result;
    }

    public function makeUpload($model)
    {
        /**
         * pega storage
         */
        $storage = $model->getStorage();
        /**
         * pega arquivo
         */
        $revistaGizFile = $model->revista_giz_path;
        /**
         * pega formato do arquivo
         */
        $format = \Image::format($revistaGizFile);
        /**
         * abre a imagem e gera o arquivo
         */
        $revistaGizImage = \Image::open($revistaGizFile)->thumbnail(new Box(162, 85));
        /**
         * envia o arquivo para o local e formato
         */
        $storage->put($model->revista_giz_relative, $revistaGizImage->get($format));
    }

    /**
     * Cria thumbnail
     *
     * @param $model
     */
//    protected function makeSliderSmall($model)
//    {
//        /**
//         * pega storage
//         */
//        $storage = $model->getStorage();
//        /**
//         * pega arquivo
//         */
//        $sliderFile = $model->slider_path;
//        /**
//         * pega formato do arquivo
//         */
//        $format = \Image::format($sliderFile);
//        /**
//         * abre a imagem e gera o arquivo
//         */
//        $thumbnailSmall = \Image::open($sliderFile)->thumbnail(new Box(162, 85));
//        /**
//         * envia o arquivo para o local e formato
//         */
//        $storage->put($model->slider_small_relative, $thumbnailSmall->get($format));
//    }

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
        if($storage->exists($model->revista_giz_relative)){
            $storage->delete([$model->revista_giz_relative]);
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
            if($storage->exists($model->revista_giz_relative)){
                $storage->deleteDirectory($model->revista_giz_folder_storage);
            }
        }
        return $model;
    }
}

<?php

namespace App\Traits;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;
use Imagine\Image\Box;

trait RevistaGizUploads
{
    /**
     * metodo utilizado em Repositories/HomePageRepositoryEloquent
     *
     * @param $id
     * @param UploadedFile $file
     * @return mixed
     */
    public function uploadImagemRevistaGiz($id, UploadedFile $file)
    {
        $model = $this->find($id);

        $name = $this->upload($model, $file);
        if ($name) {

            $model->ds_imagem = $name;

            /**
             * cria thumb da imagem com tamanho 162x85
             */
            $this->makeImage($model);

            $model->save();
        }
        return $model;
    }

    /**
     * metodo utilizado em Repositories/HomePageTempRepositoryEloquent
     *
     * @param $id
     * @param UploadedFile $file
     * @return mixed
     */
    public function uploadImagemRevistaGizTemp($id, UploadedFile $file)
    {
        $model = $this->find($id);

        $name = $this->uploadTemp($model, $file);
        if ($name) {

            $model->ds_imagem = $name;

            /**
             * cria thumb da imagem com tamanho 162x85
             */
            $this->makeImageTemp($model);

            $model->save();
        }
        return $model;
    }

    /**
     * Faz upload da imagem e deleta no storage
     *
     * @param $model
     * @param UploadedFile $file
     * @return false|string
     */
    public function upload($model, UploadedFile $file)
    {
        /** @var FilesystemAdapter $storage */
        $storage = $model->getStorage();
        // remove imagem da pasta
        $files = $storage->allFiles(substr($model->revista_giz_folder_storage, 0, strripos($model->revista_giz_folder_storage, '/')));
        $storage->delete($files);
        //cria nome para imagem
        $name = md5(time() . "{$model->id}-{$file->getClientOriginalName()}") . ".{$file->guessExtension()}";
        //faz upload
        $result = $storage->putFileAs($model->revista_giz_folder_storage, $file, $name);
        //retorna nome com sucesso ou resultado de erro
        return $result ? $name : $result;
    }

    /**
     * Faz upload da imagem e deleta no storage temp
     *
     * @param $model
     * @param UploadedFile $file
     * @return false|string
     */
    public function uploadTemp($model, UploadedFile $file)
    {
        /** @var FilesystemAdapter $storage */
        $storage = $model->getStorage();
        // remove imagem da pasta
        $files = $storage->allFiles(substr($model->revista_giz_temp_folder_storage, 0, strripos($model->revista_giz_temp_folder_storage, '/')));
        $storage->delete($files);
        //cria nome para imagem
        $name = md5(time() . "{$model->id}-{$file->getClientOriginalName()}") . ".{$file->guessExtension()}";
        //faz upload
        $result = $storage->putFileAs($model->revista_giz_temp_folder_storage, $file, $name);
        //retorna nome com sucesso ou resultado de erro
        return $result ? $name : $result;
    }

    /**
     * formata imagem
     *
     * @param $model
     * @param UploadedFile $file
     * @return false|string
     */
    public function makeImage($model)
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
     * formata imagem
     *
     * @param $model
     * @param UploadedFile $file
     * @return false|string
     */
    public function makeImageTemp($model)
    {
        /**
         * pega storage
         */
        $storage = $model->getStorage();
        /**
         * pega arquivo
         */
        $revistaGizFile = $model->revista_giz_temp_path;
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
        $storage->put($model->revista_giz_temp_relative, $revistaGizImage->get($format));
    }
}

<?php

namespace App\Traits;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;
use Imagine\Image\Box;

trait IntroUploads
{
    /**
     * Chama o model
     *
     * @param $id
     * @param UploadedFile $file
     * @return mixed
     */
    public function uploadIntro($id, UploadedFile $file1, UploadedFile $file2)
    {

        $model = $this->find($id);
        $name1 = $this->upload($model, $file1);
        $name2 = $this->upload($model, $file2);
        if($name1 && $name2){
            /**
             * verifica se existe arquivo e deleta
             */
            $this->deleteThumbOld($model);

            $model->ds_imagem_desktop = $name1;
            $model->ds_imagem_mobile = $name2;

            /**
             * cria intro da imagem com tamanho 980x380
             */
            $this->makeIntro($model);

            /**
             * criar thumbnail da imagem
             */
            $this->makeIntroSmall($model);

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
        $result = $storage->putFileAs($model->intro_folder_storage, $file, $name);
        //retorna nome com sucesso ou resultado de erro
        return $result ? $name : $result;
    }

    public function makeIntro($model)
    {
        /**
         * pega storage
         */
        $storage = $model->getStorage();

        /**
         * pega arquivo desktop
         */
        $introFile = $model->intro_desktop_path;

        /**
         * pega formato do arquivo
         */
        $format = \Image::format($introFile);

        /**
         * abre a imagem e gera o arquivo
         */
         $introImage = \Image::open($introFile)->thumbnail(new Box(980, 380));

        /**
         * envia o arquivo para o local e formato
         */
        $storage->put($model->intro_desktop_relative, $introImage->get($format));

        /**
         * pega arquivo mobile
         */
        $introFile = $model->intro_mobile_path;

        /**
         * pega formato do arquivo
         */
        $format = \Image::format($introFile);

        /**
         * abre a imagem e gera o arquivo
         */
         $introImage = \Image::open($introFile)->thumbnail(new Box(328, 321));

        /**
         * envia o arquivo para o local e formato
         */
        $storage->put($model->intro_mobile_relative, $introImage->get($format));
    }

    /**
     * Cria thumbnail
     *
     * @param $model
     */
    protected function makeIntroSmall($model)
    {
        /**
         * pega storage
         */
        $storage = $model->getStorage();
        /**
         * pega arquivo
         */
        $introFile = $model->intro_desktop_path;
        /**
         * pega formato do arquivo
         */
        $format = \Image::format($introFile);
        /**
         * abre a imagem e gera o arquivo
         */
        $thumbnailSmall = \Image::open($introFile)->thumbnail(new Box(64, 36));
        /**
         * envia o arquivo para o local e formato
         */
        $storage->put($model->intro_desktop_small_relative, $thumbnailSmall->get($format));
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
        if($storage->exists($model->intro_desktop_relative)){
            $storage->delete([$model->intro_desktop_relative, $model->intro_desktop_small_relative, $model->intro_mobile_relative]);
        }
    }

    /**
     * Deleta a pasta em caso de exclusão
     *
     * @param $id
     * @return mixed
     */
    public function deleteIntro($id)
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

            if($storage->exists($model->intro_desktop_relative)){
                $storage->deleteDirectory($model->intro_folder_storage);
            }
        }
        return $model;
    }
}

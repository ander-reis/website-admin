<?php

namespace App\Traits;


use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Http\UploadedFile;

trait ConvencaoUploads
{
    /**
     * Chama o model
     *
     * @param $id
     * @param UploadedFile $file
     * @return mixed
     */
    public function uploadConvencao($id, UploadedFile $file)
    {
        $model = $this->find($id);
        /**
         * verifica se existe arquivo e deleta
         */
        $this->deleteConvencaoOld($model, $model->convencao_relative);

        $name = $this->upload($model, $model->convencao_folder_storage, $file);

        if($name){
            /**
             * guarda o nome na tabela
             */
            $model->url_arquivo = $name;

            /**
             * salva na tabela
             */
            $model->save();
        }

        return $model;
    }

    /**
     * Chama o model
     *
     * @param $id
     * @param UploadedFile $file
     * @return mixed
     */
    public function uploadConvencaoAditamento($id, UploadedFile $file)
    {
        $model = $this->find($id);

        /**
         * verifica se existe arquivo e deleta
         */
        $this->deleteConvencaoOld($model, $model->aditamento_relative);

        $name = $this->upload($model, $model->aditamento_folder_storage, $file);

        if($name){
            /**
             * guarda o nome na tabela
             */
            $model->url_aditamento = $name;

            /**
             * salva na tabela
             */
            $model->save();
        }

        return $model;
    }

    /**
     * Faz upload da convencao no storage
     *
     * @param $model
     * @param UploadedFile $file
     * @return false|string
     */
    public function upload($model, $folder_storage, UploadedFile $file)
    {
        /** @var FilesystemAdapter $storage */
        $storage = $model->getStorage();
        //formata data para ano_ano
        $dt_validade = dateValidateUpload($model->dt_validade);
        //cria nome para convencao
        $name = $model->entidade_name . '_' . $dt_validade . ".{$file->guessExtension()}";
        //faz upload
        $result = $storage->putFileAs($folder_storage, $file, $name);
        //retorna nome com sucesso ou resultado com erro
        return $result ? $name : $result;
    }

    /**
     * Deleta convencao da pasta de upload
     *
     * @param $model
     */
    public function deleteConvencaoOld($model, $path_relative)
    {
        /** @var FilesystemAdapter $storage */
        $storage = $model->getStorage();

        /**
         * verifica se a convencao existe na pasta na hora da edição
         */
        if($storage->exists($path_relative)){
            $storage->delete($path_relative);
        }
    }
}

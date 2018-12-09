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
        $this->deleteConvencaoOld($model);

        $name = $this->upload($model, $file);

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
     * Faz upload da convencao no storage
     *
     * @param $model
     * @param UploadedFile $file
     * @return false|string
     */
    public function upload($model, UploadedFile $file)
    {
        /** @var FilesystemAdapter $storage */
        $storage = $model->getStorage();
        //formata data para ano_ano
        $dt_validade = $model->dt_validade_upload_formatted;
        //cria nome para convencao
        $name = $model->entidade_name . '_' . $dt_validade . ".{$file->guessExtension()}";
        //faz upload
        $result = $storage->putFileAs($model->convencao_folder_storage, $file, $name);
        //retorna nome com sucesso ou resultado com erro
        return $result ? $name : $result;
    }

    /**
     * Deleta convencao da pasta de upload
     *
     * @param $model
     */
    public function deleteConvencaoOld($model)
    {
        /** @var FilesystemAdapter $storage */
        $storage = $model->getStorage();
        /**
         * verifica se a convencao existe na pasta na hora da edição
         */
        if($storage->exists($model->convencao_relative)){
            $storage->delete($model->convencao_relative);
        }
    }
}
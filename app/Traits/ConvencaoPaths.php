<?php

namespace App\Traits;


trait ConvencaoPaths
{
    /**
     * Trait
     */
    use UploadsStorages;

    /**
     * Retorna convencao
     *
     * @return mixed
     */
    public function getConvencaoFolderStorageAttribute()
    {
        return "convencao/{$this->id_convencao}";
    }

    /**
     * Retorna caminho relativo
     *
     * @return string
     */
    public function getConvencaoRelativeAttribute()
    {
        return "{$this->convencao_folder_storage}/{$this->url_arquivo}";
    }

    /**
     * Retorna o caminho absoluto
     *
     * @return mixed
     */
    public function getConvencaoPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->convencao_relative);
    }

    /**
     * Download do pdf para disponibilizar no sistema
     *
     * @return string
     */
    public function getConvencaoAssetAttribute()
    {
        return route('admin.convencao.asset', ['id_convencao' => $this->id_convencao]);
    }
}

<?php

namespace App\Traits;


trait RevistaGizPaths
{
    /**
     * Trait
     */
    use UploadsStorages;

    /**
     * Path revista giz
     *
     * @return mixed
     */
    public function getRevistaGizFolderStorageAttribute()
    {
        return "revista_giz/{$this->id}";
    }

    /**
     * Path revista giz temp
     *
     * @return string
     */
    public function getRevistaGizTempFolderStorageAttribute()
    {
        return "revista_giz_temp/{$this->id}";
    }

    /**
     * Retorna caminho relativo
     *
     * @return string
     */
    public function getRevistaGizRelativeAttribute()
    {
        return "{$this->revista_giz_folder_storage}/{$this->ds_imagem}";
    }

    /**
     * Retorna caminho relativo
     *
     * @return string
     */
    public function getRevistaGizTempRelativeAttribute()
    {
        return "{$this->revista_giz_temp_folder_storage}/{$this->ds_imagem}";
    }

    /**
     * Retorna o caminho absoluto da imagem
     *
     * @return mixed
     */
    public function getRevistaGizPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->revista_giz_relative);
    }

    /**
     * Retorna o caminho absoluto da imagem
     *
     * @return mixed
     */
    public function getRevistaGizTempPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->revista_giz_temp_relative);
    }
}

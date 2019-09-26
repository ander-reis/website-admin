<?php

namespace App\Traits;


trait RevistaGizPaths
{
    /**
     * Trait
     */
    use UploadsStorages;

    /**
     * Retorna slider
     *
     * @return mixed
     */
    public function getRevistaGizFolderStorageAttribute()
    {
        return "revista_giz/{$this->id}";
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
     * Retorna o caminho absoluto da imagem
     *
     * @return mixed
     */
    public function getRevistaGizPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->revista_giz_relative);
    }

    /**
     * Gerar imagem small
     *
     * @return bool|string
     */
    public function getRevistaGizSmallRelativeAttribute()
    {
        list($name, $extension) = explode('.', $this->ds_imagem);
        return "{$this->revista_giz_folder_storage}/{$name}_small.{$extension}";
    }

    /**
     * Caminho da imagem small
     *
     * @return bool|mixed
     */
//    public function getRevistaGizSmallPathAttribute()
//    {
//        return $this->getAbsolutePath($this->getStorage(), $this->revista_giz_slider_small_relative);
//    }

    /**
     * Download da imagem para disponibilizar no sistema
     *
     * @return string
     */
    public function getThumbAssetAttribute()
    {
        //return route('admin.slider.thumb_asset', ['slider' => $this->id]);
    }

    /**
     * Download da imagem small para disponibilizar no sistema
     *
     * @return string
     */
//    public function getThumbSmallAssetAttribute()
//    {
//        return route('admin.slider.thumb_small_asset', ['slider' => $this->id]);
//    }
}

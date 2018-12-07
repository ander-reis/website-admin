<?php

namespace App\Traits;


trait SliderPaths
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
    public function getSliderFolderStorageAttribute()
    {
        return "slider/{$this->id}";
    }

    /**
     * Retorna caminho relativo
     *
     * @return string
     */
    public function getSliderRelativeAttribute()
    {
        return "{$this->slider_folder_storage}/{$this->ds_imagem}";
    }

    /**
     * Retorna o caminho absoluto da imagem
     *
     * @return mixed
     */
    public function getSliderPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->slider_relative);
    }

    /**
     * Gerar imagem small
     *
     * @return bool|string
     */
    public function getSliderSmallRelativeAttribute()
    {
        list($name, $extension) = explode('.', $this->ds_imagem);
        return "{$this->slider_folder_storage}/{$name}_small.{$extension}";
    }

    /**
     * Caminho da imagem small
     *
     * @return bool|mixed
     */
    public function getSliderSmallPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->slider_small_relative);
    }

    /**
     * Download da imagem para disponibilizar no sistema
     *
     * @return string
     */
    public function getThumbAssetAttribute()
    {
        return route('admin.slider.thumb_asset', ['slider' => $this->id]);
    }

    /**
     * Download da imagem small para disponibilizar no sistema
     *
     * @return string
     */
    public function getThumbSmallAssetAttribute()
    {
        return route('admin.slider.thumb_small_asset', ['slider' => $this->id]);
    }
}
<?php

namespace App\Traits;


trait IntroPaths
{
    /**
     * Trait
     */
    use UploadsStorages;

    /**
     * Retorna intro
     *
     * @return mixed
     */
    public function getIntroFolderStorageAttribute()
    {
        return "intro/{$this->id}";
    }

    /**
     * Retorna caminho relativo
     *
     * @return string
     */
    public function getIntroDesktopRelativeAttribute()
    {
        return "{$this->intro_folder_storage}/{$this->ds_imagem_desktop}";
    }

    public function getIntroMobileRelativeAttribute()
    {
        return "{$this->intro_folder_storage}/{$this->ds_imagem_mobile}";
    }

    /**
     * Retorna o caminho absoluto da imagem
     *
     * @return mixed
     */
    public function getIntroDesktopPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->intro_desktop_relative);
    }

    public function getIntroMobilePathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->intro_mobile_relative);
    }

    /**
     * Gerar imagem small
     *
     * @return bool|string
     */
    public function getIntroDesktopSmallRelativeAttribute()
    {
        list($name, $extension) = explode('.', $this->ds_imagem_desktop);
        return "{$this->intro_folder_storage}/{$name}_small.{$extension}";
    }

    /**
     * Caminho da imagem small
     *
     * @return bool|mixed
     */
    public function getIntroDesktopSmallPathAttribute()
    {
        return $this->getAbsolutePath($this->getStorage(), $this->intro_desktop_small_relative);
    }

    /**
     * Download da imagem para disponibilizar no sistema
     *
     * @return string
     */
    public function getThumbAssetAttribute()
    {
        return route('admin.intro.thumb_asset', ['intro' => $this->id]);
    }

    /**
     * Download da imagem small para disponibilizar no sistema
     *
     * @return string
     */
    public function getThumbSmallAssetAttribute()
    {
        return route('admin.intro.thumb_small_asset', ['intro' => $this->id]);
    }
}

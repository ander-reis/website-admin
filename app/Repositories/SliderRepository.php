<?php

namespace App\Repositories;

use Illuminate\Http\UploadedFile;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SliderRepository.
 *
 * @package namespace App\Repositories;
 */
interface SliderRepository extends RepositoryInterface
{
    public function uploadSlider($id, UploadedFile $file);
}

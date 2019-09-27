<?php

namespace App\Repositories;

use Illuminate\Http\UploadedFile;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface HomePageTempRepository.
 *
 * @package namespace App\Repositories;
 */
interface HomePageTempRepository extends RepositoryInterface
{
    /**
     * Interface upload temp
     *
     * @param $id
     * @param UploadedFile $file
     * @return mixed
     */
    public function uploadImagemRevistaGizTemp($id, UploadedFile $file);
}

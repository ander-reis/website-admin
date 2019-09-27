<?php

namespace App\Repositories;

use Illuminate\Http\UploadedFile;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface HomePageRepository.
 *
 * @package namespace App\Repositories;
 */
interface HomePageRepository extends RepositoryInterface
{
    /**
     * Interface upload
     *
     * @param $id
     * @param UploadedFile $file
     * @return mixed
     */
    public function uploadImagemRevistaGiz($id, UploadedFile $file);
}

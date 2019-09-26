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
    public function uploadRevistaGiz($id, UploadedFile $file);
}

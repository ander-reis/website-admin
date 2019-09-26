<?php

namespace App\Repositories;

use Illuminate\Http\UploadedFile;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface IntroRepository.
 *
 * @package namespace App\Repositories;
 */
interface IntroRepository extends RepositoryInterface
{
    public function uploadIntro($id, UploadedFile $file1, UploadedFile $file2);
}

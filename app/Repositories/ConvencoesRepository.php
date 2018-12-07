<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;
use Illuminate\Http\UploadedFile;

/**
 * Interface ConvencoesRepository.
 *
 * @package namespace App\Repositories;
 */
interface ConvencoesRepository extends RepositoryInterface
{
    public function uploadConvencao($id, UploadedFile $file);
    public function uploadConvencaoAditamento($id, UploadedFile $file);
}

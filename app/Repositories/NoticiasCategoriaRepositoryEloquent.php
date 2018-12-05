<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NoticiasCategoriaRepository;
use App\Models\NoticiasCategoria;
use App\Validators\NoticiasCategoriaValidator;

/**
 * Class NoticiasCategoriaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NoticiasCategoriaRepositoryEloquent extends BaseRepository implements NoticiasCategoriaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NoticiasCategoria::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

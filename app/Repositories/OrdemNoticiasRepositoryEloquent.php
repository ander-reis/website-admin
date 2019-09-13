<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OrdemNoticiasRepository;
use App\Models\OrdemNoticias;
use App\Validators\OrdemNoticiasValidator;

/**
 * Class OrdemNoticiasRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OrdemNoticiasRepositoryEloquent extends BaseRepository implements OrdemNoticiasRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrdemNoticias::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

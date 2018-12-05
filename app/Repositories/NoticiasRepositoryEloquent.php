<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\NoticiasRepository;
use App\Models\Noticias;
use App\Validators\NoticiasValidator;

/**
 * Class NoticiasRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class NoticiasRepositoryEloquent extends BaseRepository implements NoticiasRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Noticias::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ConvencoesClausulasRepository;
use App\Models\ConvencoesClausulas;
use App\Validators\ConvencoesClausulasValidator;

/**
 * Class ConvencoesClausulasRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ConvencoesClausulasRepositoryEloquent extends BaseRepository implements ConvencoesClausulasRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ConvencoesClausulas::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

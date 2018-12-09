<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ConvencoesEntidadeRepository;
use App\Models\ConvencoesEntidade;
use App\Validators\ConvencoesEntidadeValidator;

/**
 * Class ConvencoesEntidadeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ConvencoesEntidadeRepositoryEloquent extends BaseRepository implements ConvencoesEntidadeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ConvencoesEntidade::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

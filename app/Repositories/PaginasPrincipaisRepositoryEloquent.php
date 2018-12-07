<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PaginasPrincipaisRepository;
use App\Models\PaginasPrincipais;
use App\Validators\PaginasPrincipaisValidator;

/**
 * Class PaginasPrincipaisRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PaginasPrincipaisRepositoryEloquent extends BaseRepository implements PaginasPrincipaisRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaginasPrincipais::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

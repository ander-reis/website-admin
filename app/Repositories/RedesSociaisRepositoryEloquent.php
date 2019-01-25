<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RedesSociaisRepository;
use App\Models\RedesSociais;
use App\Validators\RedesSociaisValidator;

/**
 * Class RedesSociaisRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RedesSociaisRepositoryEloquent extends BaseRepository implements RedesSociaisRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return RedesSociais::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\HomePageRepository;
use App\Models\HomePage;
use App\Validators\HomePageValidator;

/**
 * Class HomePageRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HomePageRepositoryEloquent extends BaseRepository implements HomePageRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return HomePage::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

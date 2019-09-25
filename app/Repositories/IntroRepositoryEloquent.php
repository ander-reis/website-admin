<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\IntroRepository;
use App\Models\Intro;
use App\Validators\IntroValidator;

/**
 * Class IntroRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class IntroRepositoryEloquent extends BaseRepository implements IntroRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Intro::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

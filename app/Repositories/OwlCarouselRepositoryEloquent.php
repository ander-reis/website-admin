<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OwlCarouselRepository;
use App\Models\OwlCarousel;
use App\Validators\OwlCarouselValidator;

/**
 * Class OwlCarouselRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OwlCarouselRepositoryEloquent extends BaseRepository implements OwlCarouselRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OwlCarousel::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

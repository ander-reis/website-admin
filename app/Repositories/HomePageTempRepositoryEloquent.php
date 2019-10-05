<?php

namespace App\Repositories;

use App\Traits\RevistaGizUploads;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\HomePageTemp;
use phpDocumentor\Reflection\Types\Integer;

/**
 * Class HomePageTempRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class HomePageTempRepositoryEloquent extends BaseRepository implements HomePageTempRepository
{
    /**
     * Trait para upload do arquivo
     */
    use RevistaGizUploads;

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return HomePageTemp::class;
    }

    public function create(array $attributes)
    {
        $model = parent::create($attributes);

        if($model->id === 8){
            if (substr($attributes['ds_imagem'],-4) != 'jpeg') {
                $this->uploadImagemRevistaGizTemp(8, $attributes['ds_imagem']);
            }
        }

        return $model;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}

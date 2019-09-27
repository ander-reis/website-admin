<?php

namespace App\Repositories;

use App\Traits\SliderUploads;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Slider;
use App\Validators\SliderValidator;

/**
 * Class SliderRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SliderRepositoryEloquent extends BaseRepository implements SliderRepository
{
    /**
     * Trait para upload do arquivo
     */
    use SliderUploads;

    /**
     * Sobreescreve metodo create do model
     *
     * @param array $attributes
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function create(array $attributes)
    {

        $model = parent::create($attributes);

        $this->uploadSlider($model->id, $attributes['ds_imagem']);

        return $model;
    }

    /**
     *
     * Sobreescreve metodo update do model
     *
     * @param array $attributes
     * @param $id
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(array $attributes, $id)
    {
        $model = parent::update(array_except($attributes, 'ds_imagem'), $id);

        if(isset($attributes['ds_imagem'])){
            $this->uploadSlider($id, $attributes['ds_imagem']);
        }
        return $model;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Slider::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}

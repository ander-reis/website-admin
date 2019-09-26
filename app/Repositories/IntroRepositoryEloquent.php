<?php

namespace App\Repositories;

use App\Traits\IntroUploads;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
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
     * Trait para upload do arquivo
     */
    use IntroUploads;

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

        $this->uploadIntro($model->id, $attributes['ds_imagem_desktop'], $attributes['ds_imagem_mobile']);

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
        $model = parent::update(array_except($attributes, ['ds_imagem_desktop','ds_imagem_mobile']), $id);

        if(isset($attributes['ds_imagem_desktop']) && isset($attributes['ds_imagem_mobile'])){
            $this->uploadIntro($id, $attributes['ds_imagem_desktop'], $attributes['ds_imagem_mobile']);
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

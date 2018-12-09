<?php

namespace App\Repositories;

use App\Traits\AditamentoUploads;
use App\Traits\ConvencaoUploads;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Convencoes;
use App\Validators\ConvencoesValidator;

/**
 * Class ConvencoesRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ConvencoesRepositoryEloquent extends BaseRepository implements ConvencoesRepository
{
    /**
     * Trait para upload do arquivo
     */
    use ConvencaoUploads, AditamentoUploads;

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

        $this->uploadConvencao($model->id, $attributes['url_arquivo']);

        if($model->url_aditamento){
            $this->uploadConvencaoAditamento($model->id, $attributes['url_aditamento']);
        }

        return $model;
    }

    /**
     * Sobreescreve metodo update do model
     *
     * @param array $attributes
     * @param $id
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(array $attributes, $id)
    {
        $model =  parent::update(array_except($attributes, ['url_arquivo', 'url_aditamento']), $id);

        if(isset($attributes['url_arquivo'])){
            $this->uploadConvencao($model->id, $attributes['url_arquivo']);
        }

        if(isset($attributes['url_aditamento'])){
            $this->uploadConvencaoAditamento($model->id, $attributes['url_aditamento']);
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
        return Convencoes::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Convencoes;

/**
 * Class ConvencoesTransformer.
 *
 * @package namespace App\Transformers;
 */
class ConvencoesTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'clausulas'
    ];
    /**
     * Transform the Convencoes entity.
     *
     * @param \App\Models\Convencoes $model
     *
     * @return array
     */
    public function transform(Convencoes $model)
    {
        return [
            'id'         => (int) $model->id,
            'fl_entidade' => $model->fl_entidade,
            'ds_titulo' => $model->ds_titulo,
            'dt_validade' => $model->dt_validade,
            'ds_titulo_aditamento' => $model->ds_titulo_aditamento,
            'fl_app' => $model->fl_app,
            'fl_ativo' => $model->fl_ativo
        ];
    }

    public function includeClausulas(Convencoes $model)
    {
        if(!$model->clausulas){
            return null;
        }
        return $this->collection($model->clausulas, new ClausulasTransformer());
    }
}

<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Noticias;

/**
 * Class NoticiasTransformer.
 *
 * @package namespace App\Transformers;
 */
class NoticiasTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'categoria'
    ];

    /**
     * Transform the Noticias entity.
     *
     * @param \App\Models\Noticias $model
     *
     * @return array
     */
    public function transform(Noticias $model)
    {
        return [
            'id'         => (int) $model->id,
            'dt_expira' => $model->dt_expira,
            'fl_exibir_destaque' => $model->fl_exibir_destaque,
            'ds_resumo' => $model->ds_resumo,
            'ds_texto' => $model->ds_texto,
            'ds_palavra_chave' => $model->ds_palavra_chave,
            'fl_oculta' => $model->fl_oculta,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }

    public function includeCategoria(Noticias $model)
    {
        if(!$model->categoria){
            return null;
        }
        return $this->item($model->categoria, new CategoriaTransformer());
    }
}

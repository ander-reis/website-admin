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
            'ds_resumo' => $model->ds_resumo,
            'ds_texto' => $model->ds_texto,
            'ds_palavra_chave' => $model->ds_palavra_chave,
            'fl_status' => $model->fl_status,
            'dt_cadastro' => $model->dt_cadastro,
            'dt_alteracao' => $model->dt_alteracao,
            'dt_noticia' => $model->dt_noticia
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

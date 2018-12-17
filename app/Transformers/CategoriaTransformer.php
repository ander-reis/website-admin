<?php

namespace App\Transformers;

use App\Models\NoticiasCategoria;
use League\Fractal\TransformerAbstract;

/**
 * Class CategoriaTransformer.
 *
 * @package namespace App\Transformers;
 */
class CategoriaTransformer extends TransformerAbstract
{
    /**
     * Transform the Categoria entity.
     *
     * @param \App\Models\Categoria $model
     *
     * @return array
     */
    public function transform(NoticiasCategoria $model)
    {
        return [
            'id'         => (int) $model->id,
            'ds_categoria' => $model->ds_categoria,
        ];
    }
}

<?php

namespace App\Transformers;

use App\Models\ConvencoesClausulas;
use League\Fractal\TransformerAbstract;

/**
 * Class ClausulasTransformer.
 *
 * @package namespace App\Transformers;
 */
class ClausulasTransformer extends TransformerAbstract
{
    /**
     * Transform entidade ConvencoesClausulas
     *
     * @param ConvencoesClausulas $model
     * @return array
     */
    public function transform(ConvencoesClausulas $model)
    {
        return [
            'id'         => (int) $model->id,
            'id_convencao' => $model->id_convencao,
            'num_clausula' => $model->num_clausula,
            'ds_titulo' => $model->ds_titulo,
            'ds_texto' => $model->ds_texto,
            'ds_palavra_chave' => $model->ds_palavra_chave,
            'fl_ativo' => $model->fl_ativo,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

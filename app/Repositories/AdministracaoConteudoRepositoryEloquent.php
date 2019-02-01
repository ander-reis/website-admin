<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AdministracaoConteudoRepository;
use App\Models\AdministracaoConteudo;
use App\Validators\AdministracaoConteudoValidator;

/**
 * Class AdministracaoConteudoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AdministracaoConteudoRepositoryEloquent extends BaseRepository implements AdministracaoConteudoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdministracaoConteudo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

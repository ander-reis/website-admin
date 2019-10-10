<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BoletimCadastroRepository;
use App\Models\BoletimCadastro;
use App\Validators\BoletimCadastroValidator;

/**
 * Class BoletimCadastroRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BoletimCadastroRepositoryEloquent extends BaseRepository implements BoletimCadastroRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BoletimCadastro::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

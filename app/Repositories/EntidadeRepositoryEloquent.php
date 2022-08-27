<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\EntidadeRepository;
use PrefCamapua\Models\Entidade;
use PrefCamapua\Validators\EntidadeValidator;

/**
 * Class EntidadeRepositoryEloquent.
 *
 * @package namespace PrefCamapua\Repositories;
 */
class EntidadeRepositoryEloquent extends BaseRepository implements EntidadeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Entidade::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

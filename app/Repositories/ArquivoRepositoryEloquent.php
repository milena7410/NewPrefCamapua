<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\ArquivoRepository;
use PrefCamapua\Models\Arquivo;
use PrefCamapua\Validators\ArquivoValidator;

/**
 * Class ArquivoRepositoryEloquent.
 *
 * @package namespace PrefCamapua\Repositories;
 */
class ArquivoRepositoryEloquent extends BaseRepository implements ArquivoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Arquivo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\InformativoRepository;
use PrefCamapua\Models\Informativo;
use PrefCamapua\Validators\InformativoValidator;

/**
 * Class InformativoRepositoryEloquent.
 *
 * @package namespace PrefCamapua\Repositories;
 */
class InformativoRepositoryEloquent extends BaseRepository implements InformativoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Informativo::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

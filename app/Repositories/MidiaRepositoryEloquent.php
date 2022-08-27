<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\MidiaRepository;
use PrefCamapua\Models\Midia;
use PrefCamapua\Validators\MidiaValidator;

/**
 * Class MidiaRepositoryEloquent.
 *
 * @package namespace PrefCamapua\Repositories;
 */
class MidiaRepositoryEloquent extends BaseRepository implements MidiaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Midia::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

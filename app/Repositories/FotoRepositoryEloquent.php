<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\FotoRepository;
use PrefCamapua\Models\Foto;
use PrefCamapua\Validators\FotoValidator;

/**
 * Class FotoRepositoryEloquent.
 *
 * @package namespace PrefCamapua\Repositories;
 */
class FotoRepositoryEloquent extends BaseRepository implements FotoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Foto::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

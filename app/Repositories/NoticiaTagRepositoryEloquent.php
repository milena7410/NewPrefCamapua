<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use CamaraCamapua\Repositories\NoticiaTagRepository;
use CamaraCamapua\Models\NoticiaTag;
use CamaraCamapua\Validators\NoticiaTagValidator;

/**
 * Class NoticiaTagRepositoryEloquent.
 *
 * @package namespace CamaraCamapua\Repositories;
 */
class NoticiaTagRepositoryEloquent extends BaseRepository implements NoticiaTagRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NoticiaTag::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

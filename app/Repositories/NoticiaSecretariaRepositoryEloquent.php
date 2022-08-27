<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\NoticiaSecretariaRepository;
use PrefCamapua\Models\NoticiaSecretaria;

/**
 * Class NoticiaSecretariaRepositoryEloquent.
 *
 * @package namespace CamaraCamapua\Repositories;
 */
class NoticiaSecretariaRepositoryEloquent extends BaseRepository implements NoticiaSecretariaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return NoticiaSecretaria::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

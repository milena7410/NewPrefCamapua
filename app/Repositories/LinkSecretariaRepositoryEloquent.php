<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\LinkSecretariaRepository;
use PrefCamapua\Models\LinkSecretaria;
use PrefCamapua\Validators\LinkSecretariaValidator;

/**
 * Class LinkSecretariaRepositoryEloquent.
 *
 * @package namespace PrefCamapua\Repositories;
 */
class LinkSecretariaRepositoryEloquent extends BaseRepository implements LinkSecretariaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LinkSecretaria::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

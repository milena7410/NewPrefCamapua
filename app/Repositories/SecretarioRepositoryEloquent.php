<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\SecretarioRepository;
use PrefCamapua\Models\Secretario;

/**
 * Class SecretarioRepositoryEloquent.
 *
 * @package namespace CamaraCamapua\Repositories;
 */
class SecretarioRepositoryEloquent extends BaseRepository implements SecretarioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Secretario::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function listarSecretariosSelectForm()
    {
        return $this->all()->pluck('nome','id');
    }
    
}

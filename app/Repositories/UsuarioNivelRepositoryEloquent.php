<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Models\UsuarioNivel;

/**
 * Class UsuarioNivelRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UsuarioNivelRepositoryEloquent extends BaseRepository implements UsuarioNivelRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UsuarioNivel::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}

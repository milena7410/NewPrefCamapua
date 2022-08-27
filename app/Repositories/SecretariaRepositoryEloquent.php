<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\SecretariaRepository;
use PrefCamapua\Models\Secretaria;
use PrefCamapua\Validators\SecretariaValidator;

/**
 * Class SecretariaRepositoryEloquent.
 *
 * @package namespace PrefCamapua\Repositories;
 */
class SecretariaRepositoryEloquent extends BaseRepository implements SecretariaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Secretaria::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @return mixed
     */
    public function listarSecretariasFormSelect()
    {
        return $this->findWhere(['ativo' =>'1'])->pluck('secretaria','id');
    }
    
}

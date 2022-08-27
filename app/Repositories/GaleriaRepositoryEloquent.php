<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\GaleriaRepository;
use PrefCamapua\Models\Galeria;
use PrefCamapua\Validators\GaleriaValidator;

/**
 * Class GaleriaRepositoryEloquent.
 *
 * @package namespace PrefCamapua\Repositories;
 */
class GaleriaRepositoryEloquent extends BaseRepository implements GaleriaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Galeria::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param $idSecretaria
     * @return mixed
     */
    public function findGaleriasByIdSecretaria($idSecretaria)
    {
        return $this->scopeQuery(function ($query) use ($idSecretaria) {
            return $query->join('galeria_secretaria', 'id', '=', 'galeria_id')
                ->where('secretaria_id', $idSecretaria)
                ->where('ativo', '1');

        })->all();
    }

    public function listarGaleriasFormSelect()
    {
        return $this->scopeQuery(function ($query) {
            return $query->orderBy('titulo');
        })->findWhere(['ativo' => '1'])->pluck('titulo', 'id');
    }

}

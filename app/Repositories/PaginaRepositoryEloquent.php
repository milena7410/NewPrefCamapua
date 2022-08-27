<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\PaginaRepository;
use PrefCamapua\Models\Pagina;
use PrefCamapua\Validators\PaginaValidator;

/**
 * Class PaginaRepositoryEloquent.
 *
 * @package namespace PrefCamapua\Repositories;
 */
class PaginaRepositoryEloquent extends BaseRepository implements PaginaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pagina::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function listarPaginasPrincipaisFormSelect()
    {
        return $this->scopeQuery(function ($query) {
            return $query->orderBy('titulo');
        })->findWhere(['ativo' => '1',['pagina_id', '=', null]
            ])->pluck('titulo', 'id');
    }

    /**
     * @param $idSecretaria
     * @return mixed
     */
    public function findPaginasByIdSecretaria($idSecretaria)
    {
        $paginas = $this->scopeQuery(function ($query) use ($idSecretaria) {
            return $query->join('pagina_secretaria', 'id', '=', 'pagina_secretaria.pagina_id')
                ->where('secretaria_id', $idSecretaria)
                ->where('ativo','1')
                ->where('secretaria','1')
                ->orderBy('titulo');
        })->all();

        return $paginas;
    }

}

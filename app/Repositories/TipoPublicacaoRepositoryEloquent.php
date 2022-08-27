<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\TipoPublicacaoRepository;
use PrefCamapua\Models\TipoPublicacao;
use PrefCamapua\Validators\TipoPublicacaoValidator;

/**
 * Class TipoPublicacaoRepositoryEloquent.
 *
 * @package namespace PrefCamapua\Repositories;
 */
class TipoPublicacaoRepositoryEloquent extends BaseRepository implements TipoPublicacaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TipoPublicacao::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


    public function listarTodosTiposFormSelect()
    {
        return $this->scopeQuery(function ($query) {
            return $query->orderBy('tipo');
        })->findWhere(['ativo' => '1'])->pluck('tipo', 'id');
    }

    public function listarTiposFormSelect()
    {
        return $this->scopeQuery(function ($query) {
            return $query->orderBy('tipo');
        })->findWhere(['ativo' => '1', 'tipo_publicacao_id' => null])->pluck('tipo', 'id');
    }

}

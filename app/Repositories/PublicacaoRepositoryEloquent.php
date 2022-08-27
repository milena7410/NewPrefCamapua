<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\PublicacaoRepository;
use PrefCamapua\Models\Publicacao;
use PrefCamapua\Validators\PublicacaoValidator;

/**
 * Class PublicacaoRepositoryEloquent.
 *
 * @package namespace PrefCamapua\Repositories;
 */
class PublicacaoRepositoryEloquent extends BaseRepository implements PublicacaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Publicacao::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function filtroPesquisaPublicacao($numero, $ano, $descricao,$tipo)
    {
        $model = $this->model;

        if (!empty($descricao)) {
            $model = $model->where('nome', 'LIKE', "%$descricao%")
                ->orWhere('descricao', 'LIKE', "%$descricao%");
        }
        if (!empty($numero)) {
            $model = $model->where('numero', $numero);
        }

        if (!empty($ano)) {
            $model = $model->where('ano', $ano);
        }

        if (!empty($tipo)) {
            $model = $model->where('tipo_publicacao_id', $tipo);
        }

        $model = $model->orderBy('ano','desc')->orderBy('numero','desc');

        return $model->get();

    }

}

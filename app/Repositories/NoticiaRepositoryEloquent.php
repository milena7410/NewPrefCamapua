<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\NoticiaRepository;
use PrefCamapua\Models\Noticia;
use PrefCamapua\Validators\NoticiaValidator;

/**
 * Class NoticiaRepositoryEloquent.
 *
 * @package namespace PrefCamapua\Repositories;
 */
class NoticiaRepositoryEloquent extends BaseRepository implements NoticiaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Noticia::class;
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
    public function findNoticiasByIdSecretaria($idSecretaria)
    {
        $noticias = $this->scopeQuery(function ($query) use ($idSecretaria) {
            return $query->join('noticia_secretaria', 'id', '=', 'noticia_id')
                ->where('secretaria_id', $idSecretaria)
                ->where('ativo','1')
                ->orderBy('data_publicacao','DESC')
                ->orderBy('hora_publicacao','DESC');

        })->paginate();

        return $noticias;
    }

}

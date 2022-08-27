<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\LinkRepository;
use PrefCamapua\Models\Link;
use PrefCamapua\Validators\LinkValidator;

/**
 * Class LinkRepositoryEloquent.
 *
 * @package namespace PrefCamapua\Repositories;
 */
class LinkRepositoryEloquent extends BaseRepository implements LinkRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Link::class;
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
    public function findLinksByIdSecretaria($idSecretaria)
    {
        $noticias = $this->scopeQuery(function ($query) use ($idSecretaria) {
            return $query->join('link_secretaria', 'id', '=', 'link_id')
                ->where('secretaria_id', $idSecretaria)
                ->where('ativo','1');
        })->all();

        return $noticias;
    }
    
}

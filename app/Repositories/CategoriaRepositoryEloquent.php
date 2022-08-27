<?php

namespace PrefCamapua\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use PrefCamapua\Repositories\CategoriaRepository;
use PrefCamapua\Models\Categoria;
use PrefCamapua\Validators\CategoriaValidator;

/**
 * Class CategoriaRepositoryEloquent.
 *
 * @package namespace PrefCamapua\Repositories;
 */
class CategoriaRepositoryEloquent extends BaseRepository implements CategoriaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Categoria::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function listarCategoriasFormSelect()
    {
        return $this->findWhere(['ativo' =>'1'])->pluck('categoria','id');
    }
    
}

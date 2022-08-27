<?php

namespace PrefCamapua\Http\Composers;

use Illuminate\Contracts\View\View;
use PrefCamapua\Repositories\GaleriaRepository;

class GaleriaComposer
{

    /** @var GaleriaRepository */
    protected $repository;

    /**
     * GaleriaComposer constructor.
     * @param GaleriaRepository $repository
     */
    public function __construct(GaleriaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $galerias = $this->repository->scopeQuery(function ($query) {
                return $query->where('ativo', '1')->orderBy('data_galeria', 'DESC');
            })->paginate(2);

        $view->with('galerias', $galerias);
    }

}
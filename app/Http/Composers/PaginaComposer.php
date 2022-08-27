<?php

namespace PrefCamapua\Http\Composers;

use Illuminate\Contracts\View\View;
use PrefCamapua\Repositories\PaginaRepository;

class PaginaComposer
{

    /** @var PaginaRepository */
    protected $repository;

    /**
     * PaginaComposer constructor.
     * @param PaginaRepository $repository
     */
    public function __construct(PaginaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $paginas = $this->repository->findWhere(['ativo' => '1']);

        $view->with('paginas', $paginas);
    }

}
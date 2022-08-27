<?php

namespace PrefCamapua\Http\Composers;

use Illuminate\Contracts\View\View;
use PrefCamapua\Repositories\PaginaRepository;

class MenuComposer
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
        $menus = $this->repository->scopeQuery(function ($query) {
                return $query->where('ativo', '1')
                    ->where('pagina_id',null)
                    ->where('secretaria','0')
                    ->orderBy('titulo');
            })->all();

        $view->with('menus', $menus);
    }

}
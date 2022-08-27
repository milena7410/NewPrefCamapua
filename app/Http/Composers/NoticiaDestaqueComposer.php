<?php

namespace PrefCamapua\Http\Composers;

use Illuminate\Contracts\View\View;
use PrefCamapua\Repositories\NoticiaRepository;

class NoticiaDestaqueComposer
{

    /** @var NoticiaRepository */
    protected $repository;

    /**
     * NoticiaComposer constructor.
     * @param NoticiaRepository $repository
     */
    public function __construct(NoticiaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $destaques = $this->repository->scopeQuery(function ($query) {
            return $query->where('ativo', '1')->where('destaque', '1')->orderBy('data_publicacao', 'DESC')
                ->orderBy('hora_publicacao', 'DESC');
        })->paginate(3);

        $view->with('destaques', $destaques);
    }

}
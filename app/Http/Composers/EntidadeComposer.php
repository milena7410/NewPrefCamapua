<?php

namespace PrefCamapua\Http\Composers;

use Illuminate\Contracts\View\View;
use PrefCamapua\Repositories\EntidadeRepository;

class EntidadeComposer
{

    /** @var EntidadeRepository */
    protected $repository;

    /**
     * EntidadeComposer constructor.
     * @param EntidadeRepository $repository
     */
    public function __construct(EntidadeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $entidade = $this->repository->find(1);
        $view->with('entidade', $entidade);
    }

}
<?php

namespace PrefCamapua\Http\Composers;

use Illuminate\Contracts\View\View;
use PrefCamapua\Repositories\SiteRepository;

class HeaderComposer
{

    /** @var SiteRepository */
    protected $repository;

    /**
     * SiteComposer constructor.
     * @param SiteRepository $repository
     */
    public function __construct(SiteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $imagem = $this->repository->find(1);
        $view->with('background', $imagem->background);
    }

}
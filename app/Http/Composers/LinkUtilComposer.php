<?php

namespace PrefCamapua\Http\Composers;

use Illuminate\Contracts\View\View;
use PrefCamapua\Repositories\LinkRepository;

class LinkUtilComposer
{

    /** @var LinkRepository */
    protected $repository;

    /**
     * LinkPortalComposer constructor.
     * @param LinkRepository $repository
     */
    public function __construct(LinkRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $links = $this->repository->scopeQuery(function ($query){
            return $query->leftJoin('link_secretaria', 'id', '=', 'link_id')
                ->whereNull('secretaria_id');
        })->findWhere(['ativo' => '1','tipo' => 'lu']);

        $view->with('links', $links);
    }

}
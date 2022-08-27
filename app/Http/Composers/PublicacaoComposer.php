<?php

namespace PrefCamapua\Http\Composers;

use Illuminate\Contracts\View\View;
use PrefCamapua\Repositories\PublicacaoRepository;

class PublicacaoComposer
{

    /** @var PublicacaoRepository */
    protected $repository;

    /**
     * PaginaComposer constructor.
     * @param PublicacaoRepository $repository
     */
    public function __construct(PublicacaoRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $publicacoes = $this->repository->scopeQuery(function ($query) {
            return $query->where('ativo', '1')->orderBy('numero', 'DESC')->orderBy('ano','DESC');
        })->paginate(3);

        $view->with('publicacoes', $publicacoes);
    }

}
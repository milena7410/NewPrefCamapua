<?php

namespace PrefCamapua\Http\Composers;

use Illuminate\Contracts\View\View;
use PrefCamapua\Repositories\SecretariaRepository;

class SecretariaComposer
{

    /** @var SecretariaRepository */
    protected $repository;

    /**
     * SecretariaComposer constructor.
     * @param SecretariaRepository $repository
     */
    public function __construct(SecretariaRepository $repository)
    {
        $this->repository = $repository;
    }


    public function compose(View $view)
    {
        $secretarias = $this->repository->findWhere(['ativo' => '1']);

        $view->with('secretarias', $secretarias);
    }

}
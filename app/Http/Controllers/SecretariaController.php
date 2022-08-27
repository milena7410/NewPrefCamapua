<?php

namespace PrefCamapua\Http\Controllers;

use Illuminate\Http\Request;
use PrefCamapua\Repositories\GaleriaRepository;
use PrefCamapua\Repositories\LinkRepository;
use PrefCamapua\Repositories\NoticiaRepository;
use PrefCamapua\Repositories\PaginaRepository;
use PrefCamapua\Repositories\SecretariaRepository;

class SecretariaController extends Controller
{
    /** @var SecretariaRepository */
    protected $repository;

    /** @var NoticiaRepository */
    protected $noticiaRepository;

    /** @var LinkRepository */
    protected $linkRepository;

    /** @var GaleriaRepository */
    protected $galeriaRepository;

    /** @var PaginaRepository */
    protected $paginaRepository;

    /**
     * SecretariaController constructor.
     * @param SecretariaRepository $repository
     * @param NoticiaRepository $noticiaRepository
     * @param LinkRepository $linkRepository
     * @param GaleriaRepository $galeriaRepository
     * @param PaginaRepository $paginaRepository
     */
    public function __construct(
        SecretariaRepository $repository,
        NoticiaRepository $noticiaRepository,
        LinkRepository $linkRepository,
        GaleriaRepository $galeriaRepository,
        PaginaRepository $paginaRepository
    ) {
        $this->repository = $repository;
        $this->noticiaRepository = $noticiaRepository;
        $this->linkRepository = $linkRepository;
        $this->galeriaRepository = $galeriaRepository;
        $this->paginaRepository = $paginaRepository;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showByUrl(Request $request)
    {
        $url = $request->url;
        $secretaria = $this->repository->findByField('url',$url)->first();
        $noticias = $this->noticiaRepository->findNoticiasByIdSecretaria($secretaria->id);
        $links = $this->linkRepository->findLinksByIdSecretaria($secretaria->id);
        $galerias = $this->galeriaRepository->findGaleriasByIdSecretaria($secretaria->id);
        $paginas = $this->paginaRepository->findPaginasByIdSecretaria($secretaria->id);

        return view('secretarias.single',compact('secretaria','noticias','links','galerias','paginas'));
    }


}

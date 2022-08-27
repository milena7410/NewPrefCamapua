<?php

namespace PrefCamapua\Http\Controllers;

use Illuminate\Http\Request;
use PrefCamapua\Repositories\FotoRepository;
use PrefCamapua\Repositories\GaleriaRepository;

class GaleriaController extends Controller
{
    /** @var GaleriaRepository */
    protected $repository;

    /** @var FotoRepository */
    protected $fotoRepository;

    /**
     * GaleriaController constructor.
     * @param GaleriaRepository $repository
     * @param FotoRepository $fotoRepository
     */
    public function __construct(GaleriaRepository $repository, FotoRepository $fotoRepository)
    {
        $this->repository = $repository;
        $this->fotoRepository = $fotoRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $galerias = $this->repository->findWhere(['ativo' => '1']);

        return view('galeria.index', compact('galerias'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $galeria = $this->repository->find($id);
        $fotos = $this->fotoRepository->findWhere(['galeria_id' => $id]);

        return view('galeria.fotos',compact('galeria','fotos'));
    }


}

<?php

namespace PrefCamapua\Http\Controllers;

use Illuminate\Http\Request;
use PrefCamapua\Repositories\NoticiaRepository;

class NoticiaController extends Controller
{
    /** @var NoticiaRepository */
    protected $repository;

    /**
     * NoticiaController constructor.
     * @param NoticiaRepository $repository
     */
    public function __construct(NoticiaRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $noticias = $this->repository->scopeQuery(function ($query){
            return $query->where('ativo','1')->orderBy('data_publicacao','DESC');
        })->paginate();
        return view('noticias.lista', compact('noticias'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showByUrl(Request $request)
    {
        $noticia = $this->repository->findWhere(['url' => $request->url, 'ativo' => '1'])->first();

        return view('noticias.detalhe', compact('noticia'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $pesquisa = $request->busca;
        $noticias = $this->repository->scopeQuery(function ($query) use ($pesquisa) {
            return $query->where('titulo', 'LIKE', "%$pesquisa%")
                ->orWhere('descricao', 'LIKE', "%$pesquisa%");
        })->all();

        return view('pesquisa', compact('noticias', 'pesquisa'));
    }


}

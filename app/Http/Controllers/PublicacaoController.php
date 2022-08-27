<?php

namespace PrefCamapua\Http\Controllers;

use Illuminate\Http\Request;
use PrefCamapua\Repositories\PublicacaoRepository;
use PrefCamapua\Repositories\TipoPublicacaoRepository;

class PublicacaoController extends Controller
{
    /** @var PublicacaoRepository */
    protected $repository;

    /** @var TipoPublicacaoRepository */
    protected $tipoRepository;

    /**
     * PublicacaoController constructor.
     * @param PublicacaoRepository $repository
     * @param TipoPublicacaoRepository $tipoRepository
     */
    public function __construct(PublicacaoRepository $repository, TipoPublicacaoRepository $tipoRepository)
    {
        $this->repository = $repository;
        $this->tipoRepository = $tipoRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $publicacoes = $this->repository->with('arquivos')->scopeQuery(function ($query) {
            return $query->orderBy('ano', 'desc')->orderBy('numero', 'desc');
        })->findWhere(['ativo' => '1']);

        $tipos = $this->tipoRepository->listarTiposFormSelect();

        $tiposPublicacoes = $this->tipoRepository->scopeQuery(function ($query) {
            return $query->where('ativo', '1')->orderBy('tipo');
        })->all();

        return view('publicacao.index', compact('publicacoes', 'tipos', 'tiposPublicacoes'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $descricao = $request->descricao;
        $numero = $request->numero;
        $ano = $request->ano;
        $tipo = $request->tipo;
        $tipoPrincipal = null;

        if(!empty($tipo)){
            $tipoPrincipal = $this->tipoRepository->find($tipo);
        }
        $publicacoes = $this->repository->filtroPesquisaPublicacao($numero, $ano, $descricao, $tipo);
        $tipos = $this->tipoRepository->listarTiposFormSelect();
        $subtipos = $this->tipoRepository->findWhere(['ativo' => '1', 'tipo_publicacao_id' => $tipo]);
        $tiposPublicacoes = $this->tipoRepository->scopeQuery(function ($query) {
            return $query->where('ativo', '1')->whereNull('tipo_publicacao_id')->orderBy('tipo');
        })->all();
        return view('publicacao.index',
            compact('publicacoes', 'tipos', 'tiposPublicacoes', 'subtipos', 'tipoPrincipal'));
    }

    /**
     * @param $tipo
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function findByNomeTipo($tipo)
    {
        $tipoPrincipal = $this->tipoRepository->findByField('url', $tipo)->first();
        $publicacoes = $this->repository->with('arquivos')->scopeQuery(function ($query) {
            return $query->orderBy('ano', 'desc')->orderBy('numero', 'desc');
        })->findWhere(['tipo_publicacao_id' => $tipoPrincipal->id]);
        $subtipos = $this->tipoRepository->findWhere(['ativo' => '1', 'tipo_publicacao_id' => $tipoPrincipal->id]);

        $tipos = $this->tipoRepository->listarTiposFormSelect();
        $tiposPublicacoes = $this->tipoRepository->scopeQuery(function ($query) {
            return $query->where('ativo', '1')->whereNull('tipo_publicacao_id')->orderBy('tipo');
        })->all();

        return view('publicacao.index',
            compact('publicacoes', 'tipos', 'tiposPublicacoes', 'subtipos', 'tipoPrincipal'));
    }

    /**
     * @param $url
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function findPublicacaoByUrl($url)
    {
        $publicacoes = $this->repository->findByField('url', $url);
        $codTipoPublicacao = $publicacoes->first()->tipo_publicacao_id;
        $tipoPrincipal = $this->tipoRepository->find($codTipoPublicacao);
        $subtipos = $this->tipoRepository->findWhere(['ativo' => '1', 'tipo_publicacao_id' => $tipoPrincipal->id]);
        $tipos = $this->tipoRepository->listarTiposFormSelect();
        $tiposPublicacoes = $this->tipoRepository->scopeQuery(function ($query) {
            return $query->where('ativo', '1')->whereNull('tipo_publicacao_id')->orderBy('tipo');
        })->all();

        return view('publicacao.index', compact('publicacoes', 'tipos', 'tiposPublicacoes','subtipos'
                        ,'tipoPrincipal'));
    }


}

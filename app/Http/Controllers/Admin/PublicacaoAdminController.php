<?php

namespace PrefCamapua\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Http\Requests\PublicacaoRequest;
use PrefCamapua\Repositories\PublicacaoRepository;
use PrefCamapua\Repositories\TipoPublicacaoRepository;

class PublicacaoAdminController extends Controller
{
    /** @var PublicacaoRepository */
    protected $repository;

    /** @var TipoPublicacaoRepository */
    protected $tipoRepository;

    /**
     * PublicacaoAdminController constructor.
     * @param PublicacaoRepository $repository
     * @param TipoPublicacaoRepository $tipoRepository
     */
    public function __construct(PublicacaoRepository $repository, TipoPublicacaoRepository $tipoRepository)
    {
        $this->repository = $repository;
        $this->tipoRepository = $tipoRepository;
    }

    public function index()
    {
        $publicacoes = $this->repository->all();

        return view('admin.publicacao.index',compact('publicacoes'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $tipos = $this->tipoRepository->listarTodosTiposFormSelect();

        return view('admin.publicacao.create',compact('tipos'));
    }

    /**
     * @param PublicacaoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PublicacaoRequest $request)
    {
        $request->request->add(['url' => $request->nome]);
        $this->repository->create($request->all());
        flash('Publicação cadastrada com sucesso')->success();

        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $publicacao = $this->repository->find($id);
        $tipos = $this->tipoRepository->listarTodosTiposFormSelect();

        return view('admin.publicacao.edit',compact('publicacao','tipos'));
    }

    /**
     * @param PublicacaoRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PublicacaoRequest $request,$id)
    {
        $request->request->add(['url' => $request->nome]);
        $this->repository->update($request->all(),$id);
        flash('Publicação atualizada com sucesso')->success();

        return redirect()->action('Admin\PublicacaoAdminController@index');
    }

}

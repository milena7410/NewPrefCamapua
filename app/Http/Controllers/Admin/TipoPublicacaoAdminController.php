<?php

namespace PrefCamapua\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Http\Requests\TipoPublicacaoRequest;
use PrefCamapua\Repositories\TipoPublicacaoRepository;

class TipoPublicacaoAdminController extends Controller
{
    /**
     * @var TipoPublicacaoRepository
     */
    private $repository;

    /**
     * TipoPublicacaoAdminController constructor.
     * @param TipoPublicacaoRepository $repository
     */
    public function __construct(TipoPublicacaoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = $this->repository->all();

        return view('admin.tipoPublicacao.create', compact('tipos'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createSubtipo($id)
    {
        $tipo = $this->repository->find($id);
        $subtipos = $this->repository->findWhere(['tipo_publicacao_id' => $id]);

        return view('admin.tipoPublicacao.subtipo_create', compact('tipo','subtipos'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $tipo = $this->repository->find($id);

        return view('admin.tipoPublicacao.edit', compact('tipo'));
    }

    /**
     * @param TipoPublicacaoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TipoPublicacaoRequest $request)
    {
        $request->request->add(['url' => $request->tipo]);
        $this->repository->create($request->all());
        flash()->success('Uma nova tipo de publicação foi cadastrada com sucesso.');

        return back();
    }

    /**
     * @param TipoPublicacaoRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(TipoPublicacaoRequest $request, $id)
    {
        $request->request->add(['url' => $request->tipo]);
        $this->repository->update($request->all(), $id);
        flash()->success('O tipo de publicação foi editado com sucesso.');

        return redirect()->action('Admin\TipoPublicacaoAdminController@create');
    }

    /**
     * @param int $id
     * @param string $status
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function enableOrDisable($id, $status ='0')
    {
        $this->repository->update(['ativo' => $status], $id);
        flash()->success('O status  da tipo foi alterado com sucesso.');

        return redirect()->back();
    }
}

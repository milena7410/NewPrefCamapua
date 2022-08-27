<?php

namespace PrefCamapua\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Http\Requests\ArquivoRequest;
use PrefCamapua\Repositories\ArquivoRepository;

class ArquivoAdminController extends Controller
{
    /** @var ArquivoRepository */
    protected $repository;

    /** @var string  */
    private $caminho = 'arquivos/publicacoes/';

    /**
     * ArquivoAdminController constructor.
     * @param ArquivoRepository $repository
     */
    public function __construct(ArquivoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $idPublicacao
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($idPublicacao)
    {
        $arquivos = $this->repository->findWhere(['publicacao_id' => $idPublicacao]);

        return view('admin.arquivo.create', compact('idPublicacao', 'arquivos'));
    }

    /**
     * @param ArquivoRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ArquivoRequest $request)
    {
        $arquivo = uniqid() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move($this->caminho, $arquivo);
        $request->request->add([
            'arquivo' => $arquivo,
            'mimetype' => $request->file->getClientMimeType(),
            'caminho' => $this->caminho
        ]);

        $this->repository->create($request->all());
        flash('Arquivo adicionado com sucesso')->success();

        return back();
    }

    /**
     * @param int $id
     * @param string $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus($id, $status='0')
    {
        $this->repository->update(['ativo' => $status], $id);
        flash('Arquivo atualizado com sucesso')->success();

        return back();
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        $this->repository->delete($id);
        flash('Arquivo removido com sucesso')->success();

        return back();
    }

}

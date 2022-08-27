<?php

namespace PrefCamapua\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Http\Requests\MidiaRequest;
use PrefCamapua\Repositories\MidiaRepository;

class MidiaAdminController extends Controller
{
    /** @var MidiaRepository */
    protected $repository;

    private $caminho = 'arquivos/midias/';

    /**
     * MidiaAdminController constructor.
     * @param MidiaRepository $repository
     */
    public function __construct(MidiaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $midias = $this->repository->all();
        return view('admin.midia.create', compact('midias'));
    }

    /**
     * @param MidiaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(MidiaRequest $request)
    {
        $midia = uniqid() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move($this->caminho, $midia);
        $request->request->add([
            'arquivo' => $midia,
            'mimetype' => $request->file->getClientMimeType(),
            'caminho' => $this->caminho
        ]);

        $this->repository->create($request->all());
        flash('Midia adicionado com sucesso')->success();

        return back();
    }

    /**
     * @param int $id
     * @param string $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeStatus($id, $status = '0')
    {
        $this->repository->update(['ativo' => $status], $id);
        flash('Midia atualizado com sucesso')->success();

        return back();
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($id)
    {
        $this->repository->delete($id);
        flash('Midia removido com sucesso')->success();

        return back();

    }
}

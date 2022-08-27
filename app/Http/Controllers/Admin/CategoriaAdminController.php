<?php

namespace PrefCamapua\Http\Controllers\Admin;

use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Http\Requests\CategoriaRequest;
use PrefCamapua\Repositories\CategoriaRepository;

class CategoriaAdminController extends Controller
{
    /**
     * @var CategoriaRepository
     */
    private $repository;

    /**
     * CategoriaAdminController constructor.
     * @param CategoriaRepository $repository
     */
    public function __construct(CategoriaRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = $this->repository->all();

        return view('admin.categoria.create', compact('categorias'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $categoria = $this->repository->find($id);

        return view('admin.categoria.edit', compact('categoria'));
    }

    /**
     * @param CategoriaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoriaRequest $request)
    {
        $request->request->add(['url' => $request->categoria]);
        $this->repository->create($request->all());

        flash()->success('Uma nova categoria foi cadastrada com sucesso.');

        return back();
    }

    /**
     * @param CategoriaRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(CategoriaRequest $request, $id)
    {
        $request->request->add(['url' => $request->categoria]);
        $this->repository->update($request->all(), $id);

        flash()->success('A categoria foi editada com sucesso.');

        return redirect()->action('Admin\CategoriaAdminController@create');
    }

    /**
     * @param int $id
     * @param int $status
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function enableOrDisable($id, $status = 0)
    {
        $this->repository->update(['ativo' => $status], $id);
        flash()->success('O status  da categoria foi alterado com sucesso.');

        return redirect()->action('Admin\CategoriaAdminController@create');
    }
}

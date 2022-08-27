<?php

namespace PrefCamapua\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Http\Requests\CargoCreatedRequest;
use PrefCamapua\Repositories\CargoRepository;

class CargoAdminController extends Controller
{

    /** @var CargoRepository */
    protected $repository;

    /**
     * CargoAdminController constructor.
     * @param CargoRepository $repository
     */
    public function __construct(CargoRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cargos = $this->repository->all();

        return view('admin.cargo.create', compact('cargos'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $cargo = $this->repository->find($id);

        return view('admin.cargo.edit', compact('cargo'));
    }

    /**
     * @param CargoCreatedRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CargoCreatedRequest $request)
    {
        $request->request->add(['url' => $request->categoria]);
        $this->repository->create($request->all());

        flash()->success('Uma nova cargo foi cadastrada com sucesso.');

        return back();
    }

    /**
     * @param CargoCreatedRequest $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(CargoCreatedRequest $request, $id)
    {
        $request->request->add(['url' => $request->cargo]);
        $this->repository->update($request->all(), $id);

        flash()->success('A cargo foi editada com sucesso.');

        return redirect()->action('Admin\CargoAdminController@create');
    }

    /**
     * @param int $id
     * @param int $status
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function enableOrDisable($id, $status = 0)
    {
        $this->repository->update(['ativo' => $status], $id);
        flash()->success('O status  da cargo foi alterado com sucesso.');

        return redirect()->action('Admin\CargoAdminController@create');
    }
}

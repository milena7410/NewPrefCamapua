<?php

namespace PrefCamapua\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Http\Requests\GaleriaRequest;
use PrefCamapua\Repositories\GaleriaRepository;
use PrefCamapua\Repositories\SecretariaRepository;

class GaleriaAdminController extends Controller
{

    /** @var GaleriaRepository */
    protected $repository;

    /** @var SecretariaRepository */
    protected $secretariaRepository;

    /**
     * GaleriaAdminController constructor.
     * @param GaleriaRepository $repository
     * @param SecretariaRepository $secretariaRepository
     */
    public function __construct(GaleriaRepository $repository, SecretariaRepository $secretariaRepository)
    {
        $this->repository = $repository;
        $this->secretariaRepository = $secretariaRepository;
    }


    public function index()
    {
        $galerias = $this->repository->all();

        return view('admin.galeria.index', compact('galerias'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $secretarias = $this->secretariaRepository->listarSecretariasFormSelect();
        return view('admin.galeria.create', compact('secretarias'));
    }

    /**
     * @param GaleriaRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GaleriaRequest $request)
    {
        $galeria = $this->repository->create($request->all());
        $galeria->secretarias()->sync($request->secretarias);
        flash('Galeria cadastrada com sucesso')->success();

        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $galeria = $this->repository->find($id);
        $secretarias = $this->secretariaRepository->listarSecretariasFormSelect();

        return view('admin.galeria.edit', compact('galeria','secretarias'));
    }

    /**
     * @param GaleriaRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GaleriaRequest $request, $id)
    {
        $galeria = $this->repository->update($request->all(), $id);
        $galeria->secretarias()->sync($request->secretarias);
        flash('Galeria atualizada com sucesso')->success();

        return redirect()->action('Admin\GaleriaAdminController@index');
    }

}

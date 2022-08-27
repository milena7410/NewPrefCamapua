<?php

namespace PrefCamapua\Http\Controllers\Admin;

use PrefCamapua\Repositories\PaginaRepository;
use Illuminate\Http\Request;
use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Repositories\SecretariaRepository;

class PaginaAdminController extends Controller
{
    /** @var  PaginaRepository */
    protected $repository;

    /** @var SecretariaRepository */
    protected $secretariaRepository;

    /**
     * PaginaAdminController constructor.
     * @param PaginaRepository $repository
     * @param SecretariaRepository $secretariaRepository
     */
    public function __construct(PaginaRepository $repository, SecretariaRepository $secretariaRepository)
    {
        $this->repository = $repository;
        $this->secretariaRepository = $secretariaRepository;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAll()
    {
        $paginas = $this->repository->all();

        return view('admin.pagina.list', compact('paginas'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $paginas = $this->repository->listarPaginasPrincipaisFormSelect();
        $secretarias = $this->secretariaRepository->listarSecretariasFormSelect();

        return view('admin.pagina.create', compact('paginas', 'secretarias'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (empty($request->url)) {
            $request->request->add(['url' => str_slug($request->titulo)]);
        }
        $pagina = $this->repository->create($request->all());
        $pagina->secretarias()->sync($request->secretarias);
        flash()->success('Página Adicionada com Sucesso');

        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $paginas = $this->repository->listarPaginasPrincipaisFormSelect();
        $pagina = $this->repository->find($id);
        $secretarias = $this->secretariaRepository->listarSecretariasFormSelect();

        return view('admin.pagina.edit', compact('pagina', 'paginas', 'secretarias'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        if (empty($request->url)) {
            $request->request->add(['url' => str_slug($request->titulo)]);
        }
        $pagina = $this->repository->update($request->all(), $id);
        $pagina->secretarias()->sync($request->secretarias);
        flash()->success('Página alterada com Sucesso');

        return back();
    }

}

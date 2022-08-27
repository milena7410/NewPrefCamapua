<?php

namespace PrefCamapua\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Http\Requests\SecretariaCreateRequest;
use PrefCamapua\Http\Requests\SecretariaUpdateRequest;
use PrefCamapua\Repositories\SecretariaRepository;
use PrefCamapua\Repositories\SecretarioRepository;

class SecretariaAdminController extends Controller
{
    /** @var SecretariaRepository */
    protected $repository;

    /** @var SecretarioRepository */
    protected $secretarioRepository;

    /**
     * SecretariaAdminController constructor.
     * @param SecretariaRepository $repository
     * @param SecretarioRepository $secretarioRepository
     */
    public function __construct(SecretariaRepository $repository, SecretarioRepository $secretarioRepository)
    {
        $this->repository = $repository;
        $this->secretarioRepository = $secretarioRepository;
    }


    public function create()
    {
        $secretarios = $this->secretarioRepository->listarSecretariosSelectForm();
        return view('admin.secretaria.create', compact('secretarios'));
    }

    /**
     * @param SecretariaCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SecretariaCreateRequest $request)
    {
        try {
            $url = str_slug($request->secretaria);
            $request->request->add(['url' => $url]);
            $this->repository->create($request->all());
            flash()->success('Uma nova secretaria foi cadastrado com sucesso.');

        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }

        return back();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $secretarias = $this->repository->all();
        return view('admin.secretaria.index',compact('secretarias'));
    }

    public function edit($id)
    {
        $secretaria = $this->repository->find($id);
        $secretarios = $this->secretarioRepository->listarSecretariosSelectForm();

        return view('admin.secretaria.edit',compact('secretaria','secretarios'));
    }

    /**
     * @param SecretariaUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SecretariaUpdateRequest $request,$id)
    {
        $this->repository->update($request->all(),$id);
        flash('Os dados da secretaria foram atualizados com sucesso')->success();

        return redirect()->action('Admin\SecretariaAdminController@index');
    }
}

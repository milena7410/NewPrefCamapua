<?php

namespace PrefCamapua\Http\Controllers\Admin;

use PrefCamapua\Http\Requests\SecretarioCreateRequest;
use PrefCamapua\Http\Requests\SecretarioUpdateRequest;
use PrefCamapua\Repositories\CargoRepository;
use PrefCamapua\Repositories\SecretarioRepository;
use Illuminate\Http\Request;
use PrefCamapua\Http\Controllers\Controller;

class SecretarioAdminController extends Controller
{
    /** @var SecretarioRepository */
    protected $repository;

    /** @var CargoRepository */
    protected $cargoRepository;

    /** @var string */
    private $caminho = 'images/secretarios/';

    /**
     * SecretarioController constructor.
     * @param SecretarioRepository $repository
     * @param CargoRepository $cargoRepository
     */
    public function __construct(SecretarioRepository $repository, CargoRepository $cargoRepository)
    {
        $this->repository = $repository;
        $this->cargoRepository = $cargoRepository;
    }

    public function create()
    {
        $cargos = $this->cargoRepository->listarCargoSelectForm();
        return view('admin.secretario.create', compact('cargos'));
    }

    /**
     * @param SecretarioCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SecretarioCreateRequest $request)
    {
        try {
            $imagem = uniqid() . '.jpg';
            $this->salvarImagem($request->foto, $imagem, $this->caminho, 123, 161);

            $request->request->add(['imagem' => $imagem,'caminho_imagem' => $this->caminho]);
            $this->repository->create($request->all());
            flash()->success('Um novo secretário foi cadastrado com sucesso.');

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
        $secretarios = $this->repository->all();
        return view('admin.secretario.index',compact('secretarios'));
    }

    public function edit($id)
    {
        $secretario = $this->repository->find($id);
        $cargos = $this->cargoRepository->listarCargoSelectForm();

        return view('admin.secretario.edit',compact('secretario','cargos'));
    }

    /**
     * @param SecretarioUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(SecretarioUpdateRequest $request,$id)
    {
        $this->repository->update($request->all(),$id);
        flash('Os dados do secretário foram atualizados com sucesso')->success();

        return redirect()->action('Admin\SecretarioAdminController@index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePhoto($id)
    {
        $secretario = $this->repository->find($id);

        return view('admin.secretario.changePhoto',compact('secretario'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePhoto(Request $request, $id)
    {
        $imagem = uniqid() . '.jpg';
        $this->salvarImagem($request->foto, $imagem, $this->caminho, 123, 161);
        $request->request->add(['imagem' => $imagem, 'caminho_imagem' => $this->caminho]);

        $this->repository->update($request->all(), $id);
        flash()->success('A imagem do secretário foi alterado com sucesso.');

        return redirect()->action('Admin\SecretarioAdminController@index');
    }
}

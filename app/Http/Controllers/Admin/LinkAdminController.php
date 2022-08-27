<?php

namespace PrefCamapua\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Http\Requests\LinkCreateRequest;
use PrefCamapua\Repositories\LinkRepository;
use PrefCamapua\Repositories\SecretariaRepository;

class LinkAdminController extends Controller
{
    /** @var LinkRepository */
    protected $repository;

    /** @var SecretariaRepository */
    protected $secretariaRepository;

    private $caminho = 'images/links/';

    /**
     * LinkAdminController constructor.
     * @param LinkRepository $repository
     * @param SecretariaRepository $secretariaRepository
     */
    public function __construct(LinkRepository $repository, SecretariaRepository $secretariaRepository)
    {
        $this->repository = $repository;
        $this->secretariaRepository = $secretariaRepository;
    }

    public function index()
    {
        $links = $this->repository->all();

        return view('admin.links.index',compact('links'));
        
    }

    public function create()
    {
        $secretarias = $this->secretariaRepository->listarSecretariasFormSelect();
        return view('admin.links.create',compact('secretarias'));
    }

    /**
     * @param LinkCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LinkCreateRequest $request)
    {
        try {
            $imagem = uniqid() . '.jpg';
            $this->salvarImagem($request->foto, $imagem, $this->caminho, 170, 113);

            $request->request->add(['imagem' => $imagem,'caminho_imagem' => $this->caminho]);

            $link = $this->repository->create($request->all());
            $link->secretarias()->sync($request->secretarias);

            flash('Link Cadastrado com sucesso')->success();

        } catch (\Exception $e) {
             flash()->error($e->getMessage());
           /* flash('Desculpe, ocorreu um problema ao cadastrar esse Link, por favor, verique todos
                    os campos e tente novamente.')->warning();*/
        }

        return back();
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $link = $this->repository->find($id);
        $secretarias = $this->secretariaRepository->listarSecretariasFormSelect();

        return view('admin.links.edit',compact('secretarias','link'));
    }

    /**
     * @param LinkCreateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(LinkCreateRequest $request,$id)
    {
        try {
            $link = $this->repository->update($request->all(),$id);
            $link->secretarias()->sync($request->secretarias);

            flash('Link Atualizado com sucesso')->success();

        } catch (\Exception $e) {
            flash()->error($e->getMessage());
            /* flash('Desculpe, ocorreu um problema ao cadastrar esse Link, por favor, verique todos
                     os campos e tente novamente.')->warning();*/
        }

        return redirect()->action('Admin\LinkAdminController@index');
    }


}

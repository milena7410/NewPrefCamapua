<?php

namespace PrefCamapua\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Repositories\EntidadeRepository;

class EntidadeAdminController extends Controller
{
    /** @var EntidadeRepository */
    protected $repository;

    /**
     * EntidadeAdminController constructor.
     * @param EntidadeRepository $repository
     */
    public function __construct(EntidadeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $entidade = $this->repository->find($id);

        return view('admin.entidade.edit',compact('entidade'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->repository->update($request->all(),$id);
        flash('Os dados da entidade foram atualizados com sucesso')->success();

        return back();
    }


}

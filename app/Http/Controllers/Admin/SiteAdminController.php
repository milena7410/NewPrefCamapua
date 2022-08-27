<?php

namespace PrefCamapua\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Repositories\SiteRepository;

class SiteAdminController extends Controller
{
    /** @var SiteRepository */
    protected $repository;

    /**
     * SiteAdminController constructor.
     * @param SiteRepository $repository
     */
    public function __construct(SiteRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $dados = $this->repository->find($id);

        return view('admin.site.edit',compact('dados'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->repository->update($request->all(),$id);
        flash('Os dados foram atualizados com sucesso')->success();

        return back();
    }

}

<?php

namespace PrefCamapua\Http\Controllers;

use Illuminate\Http\Request;;

use PrefCamapua\Services\EmailServices;
use PrefCamapua\Repositories\EntidadeRepository;
use PrefCamapua\Repositories\PaginaRepository;

class PaginaController extends Controller
{
    /** @var PaginaRepository */
    protected $repository;

    /** @var EmailServices */
    protected $emailService;

    /** @var  EntidadeRepository */
    protected $entidadeRepository;

    /**
     * PaginaController constructor.
     * @param PaginaRepository $repository
     * @param EmailServices $emailService
     * @param EntidadeRepository $entidadeRepository
     */
    public function __construct(
        PaginaRepository $repository,
        EmailServices $emailService,
        EntidadeRepository $entidadeRepository
    ) {
        $this->repository = $repository;
        $this->emailService = $emailService;
        $this->entidadeRepository = $entidadeRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request)
    {
        $pagina = $this->repository->findWhere(['url' => $request->url,'ativo' => '1'])->first();

        return view('pagina',compact('pagina'));

    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contatar(Request $request)
    {
        $emailPrefeitura = $this->entidadeRepository->find(1)->email;
        $this->emailService->sendEmailContact($request,$emailPrefeitura);
        flash()->success('Mensagem enviada com sucesso. Logo entraremos em contato. Obrigado.');

        return view('contato');
    }


}

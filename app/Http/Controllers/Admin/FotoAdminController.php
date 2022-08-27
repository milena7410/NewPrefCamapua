<?php

namespace PrefCamapua\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Repositories\FotoRepository;

class FotoAdminController extends Controller
{
    /** @var FotoRepository */
    protected $repository;

    /** @var string */
    private $caminho = 'images/galeria/';

    /**
     * FotoAdminController constructor.
     * @param FotoRepository $repository
     */
    public function __construct(FotoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $galeriaId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function images($galeriaId)
    {
        $imagens = $this->repository->findWhere(['galeria_id' => $galeriaId]);

        return view('admin.fotos.edit', compact('imagens', 'galeriaId'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload(Request $request)
    {
        $imagem = uniqid() . '.jpg';
        $this->salvarImagem($request->imagem, $imagem, $this->caminho);
        $request->request->add([
            'foto' => $imagem,
            'mimetype' => $request->imagem->getClientMimeType(),
            'caminho' => $this->caminho
        ]);
        $this->repository->create($request->all());
        flash()->success('A imagem foi inserida com sucesso.');

        return redirect()->route('admin.foto.edit', [$request->galeria_id]);
    }


    /**
     * @param int $id
     * @param int $idGaleria
     * @return \Illuminate\Http\RedirectResponse
     */
    public function definirCapa($id, $idGaleria)
    {
        $imagemPricipalAtual = $this->repository->findWhere(['galeria_id' => $idGaleria, 'capa' => '1'])->first();
        if(!empty($imagemPricipalAtual)){
            $imagemPricipalAtual->update(['capa' => '0']);
        }

        $this->repository->update(['capa' => '1'], $id);

        flash()->success('A imagem foi definida como a capa com sucesso.');
        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        flash()->success('A imagem foi removida com sucesso.');

        return back();
    }
}

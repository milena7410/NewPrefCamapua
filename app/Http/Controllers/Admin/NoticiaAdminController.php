<?php

namespace PrefCamapua\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Http\Requests\NoticiaCreateRequest;
use PrefCamapua\Http\Requests\NoticiaUpdateRequest;
use PrefCamapua\Models\Tag;
use PrefCamapua\Repositories\CategoriaRepository;
use PrefCamapua\Repositories\GaleriaRepository;
use PrefCamapua\Repositories\NoticiaRepository;
use PrefCamapua\Repositories\SecretariaRepository;

class NoticiaAdminController extends Controller
{
    /** @var NoticiaRepository */
    protected $repository;

    /** @var CategoriaRepository */
    protected $categoriaRepository;

    /** @var SecretariaRepository */
    protected $secretariaRepository;

    /** @var GaleriaRepository */
    protected $galeriaRepository;

    /** @var string */
    private $caminho = 'images/noticias/';

    /**
     * NoticiaAdminController constructor.
     * @param NoticiaRepository $repository
     * @param CategoriaRepository $categoriaRepository
     * @param SecretariaRepository $secretariaRepository
     * @param GaleriaRepository $galeriaRepository
     */
    public function __construct(
        NoticiaRepository $repository,
        CategoriaRepository $categoriaRepository,
        SecretariaRepository $secretariaRepository,
        GaleriaRepository $galeriaRepository
    ) {
        $this->repository = $repository;
        $this->categoriaRepository = $categoriaRepository;
        $this->secretariaRepository = $secretariaRepository;
        $this->galeriaRepository = $galeriaRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categorias = $this->categoriaRepository->listarCategoriasFormSelect();
        $secretarias = $this->secretariaRepository->listarSecretariasFormSelect();
        $galerias = $this->galeriaRepository->listarGaleriasFormSelect();

        return view('admin.noticia.create', compact('categorias', 'secretarias','galerias'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $noticias = $this->repository->all();

        return view('admin.noticia.index', compact('noticias'));
    }


    /**
     * @param NoticiaCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NoticiaCreateRequest $request)
    {
        try {
            $imagem = uniqid() . '.jpg';
            $this->salvarImagem($request->foto, $imagem, $this->caminho, 579, 398);

            $tags = $this->findOrCreateTags($request->tags);

            $request->request->add([
                'url' => $request->titulo,
                'imagem' => $imagem,
                'caminho_imagem' => $this->caminho
            ]);

            $noticia = $this->repository->create($request->all());
            $noticia->secretarias()->sync($request->secretarias);
            $noticia->tags()->sync($tags);

            flash('Notícia Cadastrada com sucesso')->success();

        } catch (\Exception $e) {
//             flash()->error($e->getMessage());
            flash('Desculpe, ocorreu um problema ao cadastrar essa notícia, por favor, verique todos
                    os campos e tente novamente.')->warning();
        }

        return back();
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $noticia = $this->repository->find($id);
        $categorias = $this->categoriaRepository->listarCategoriasFormSelect();
        $secretarias = $this->secretariaRepository->listarSecretariasFormSelect();
        $galerias = $this->galeriaRepository->listarGaleriasFormSelect();

        return view('admin.noticia.edit', compact('categorias', 'secretarias', 'noticia','galerias'));
    }

    /**
     * @param NoticiaUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NoticiaUpdateRequest $request, $id)
    {
        try {
            $tags = $this->findOrCreateTags($request->tags);

            $request->request->add(['url' => $request->titulo]);

            $noticia = $this->repository->update($request->all(), $id);
            $noticia->secretarias()->sync($request->secretarias);
            $noticia->tags()->sync($tags);

            flash('Notícia atualizada com sucesso')->success();

        } catch (\Exception $e) {
            // flash()->error($e->getMessage());
            flash('Desculpe, ocorreu um problema ao cadastrar essa notícia, por favor, verique todos 
                    os campos e tente novamente.')->warning();
        }

        return back();
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePhoto($id)
    {
        $noticia = $this->repository->find($id);

        return view('admin.noticia.changePhoto',compact('noticia'));
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePhoto(Request $request, $id)
    {
        $imagem = uniqid() . '.jpg';
        $this->salvarImagem($request->foto, $imagem, $this->caminho, 579, 398);
        $request->request->add(['imagem' => $imagem, 'caminho_imagem' => $this->caminho]);

        $this->repository->update($request->all(), $id);
        flash()->success('A imagem da noticia foi alterado com sucesso.');

        return redirect()->action('Admin\NoticiaAdminController@index');
    }

    /**
     * @param string $tag
     * @return array
     */
    private function findOrCreateTags($tag)
    {
        $tags = separateItemsByCommas($tag);
        $tagsNoticia = [];
        foreach ($tags as $palavra) {
            $tagsNoticia[] = Tag::firstOrCreate(['tag' => $palavra])->id;
        }

        return $tagsNoticia;
    }

}

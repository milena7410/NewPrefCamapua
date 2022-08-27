<?php

namespace PrefCamapua\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use PrefCamapua\Http\Controllers\Controller;
use PrefCamapua\Http\Requests\BannerRequest;
use PrefCamapua\Repositories\BannerRepository;

class BannerAdminController extends Controller
{
    /**
     * @var BannerRepository
     */
    private $repository;

    /**
     * @var string
     */
    private $filepath = 'uploads/banners/';

    /**
     * BannerAdminController constructor.
     * @param BannerRepository $repository
     */
    public function __construct(BannerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banners = $this->repository->all();

        return view('admin.banner.create',compact('banners'));
    }

    /**
     * @param $image
     * @return string
     */
    private function upload($image)
    {
        if (!empty($image)) {
            $extensao = $image->getClientOriginalExtension();
            $filename = uniqid('banner_').".$extensao";
            $filepath = $this->filepath.'/'.$filename;

            try {
                Image::make($image->getRealPath())->resize(1920, 400)->save($filepath);
                return $filename;
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }
    }

    /**
     * @param BannerRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BannerRequest $request)
    {
        $filename = $this->upload($request->banner);

        $this->repository->create([
            'banner' => $filename,
            'link' => $request->link,
            'caminho' => $this->filepath,
            'mimetype' => $request->banner->getMimeType(),
            'user_id' => auth()->user()->id,
            'ativo' => 1
        ]);

        flash()->success('Banner inserido com sucesso.');

        return redirect()->route('admin.banner.create');
    }


    /**
     * @param $id
     * @param int $status
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function enableOrDisableCategory($id, $status = 0)
    {
        if($status != 0) {
            DB::table('banners')->where('ativo', 1)->update(['ativo' => 0]);
        }

        $this->repository->update(['ativo' => $status],$id);
        flash()->success('O status do Banner foi alterado com sucesso.');

        return redirect()->route('admin.banner.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->delete($id);
        //unlink(public_path($imagem));
        flash()->success('O Banner foi removido com sucesso.');

        return redirect()->route('admin.banner.create');
    }
}

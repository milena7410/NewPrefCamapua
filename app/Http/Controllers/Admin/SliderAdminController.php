<?php

namespace Ead\Http\Controllers\Admin;

use Ead\Http\Controllers\Controller;
use Ead\Http\Requests\SliderRequest;
use Ead\Model\Slider;
use Ead\Repositories\SliderRepository;
use Intervention\Image\Facades\Image;


class SliderAdminController extends Controller
{
    /**
     * @var SliderRepository
     */
    private $repository;

    /**
     * @var Slider
     */
    private $slider;

    /**
     * @var string
     */
    private $filepath = 'uploads/slider/';

    /**
     * SliderAdminController constructor.
     * @param SliderRepository $repository
     * @param Slider $slider
     */
    public function __construct(SliderRepository $repository, Slider $slider)
    {
        $this->repository = $repository;
        $this->slider = $slider;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sliders = $this->repository->all();

        return view('admin.slider.create',compact('sliders'));
    }

    /**
     * @param $image
     * @return string
     */
    private function upload($image)
    {
        if (!empty($image)) {
            $extensao = $image->getClientOriginalExtension();
            $filename = uniqid('slider_').".$extensao";
            $filepath = $this->filepath.'/'.$filename;
            try {
                Image::make($image->getRealPath())->resize(1600, 400)->save($filepath);
                return $filename;
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        }

    }

    /**
     * @param SliderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SliderRequest $request)
    {
        $filename = $this->upload($request->slider);

        $this->repository->create([
            'slider' => $filename,
            'link' => $request->link,
            'descricao' => $request->descricao,
            'caminho' => $this->filepath,
            'mimetype' => $request->slider->getMimeType(),
            'tamanho' => $request->slider->getSize(),
            'user_id' => auth()->user()->id,
            'ativo' => $request->ativo
        ]);

        flash()->success('Um Slider foi inserido com sucesso.');

        return redirect()->route('admin.slider.create');
    }


    /**
     * @param $id
     * @param int $status
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function enableOrDisableCategory($id, $status = 0)
    {
        $this->repository->update(['ativo' => $status], $id);
        flash()->success('O status do Slider foi alterado com sucesso.');

        return redirect()->route('admin.slider.create');
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
        flash()->success('O Slider foi removido com sucesso.');

        return redirect()->route('admin.slider.create');
    }
}

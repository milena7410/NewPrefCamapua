<?php

namespace PrefCamapua\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\Facades\Image;
use PrefCamapua\Http\Requests\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param Request $arquivo
     * @param $nomeArquivo
     * @param string $caminho
     * @param int $x
     * @param int $y
     */
    public function salvarImagem($arquivo, $nomeArquivo, $caminho = 'public/img', $x = 0, $y = 0)
    {
        $path = ($caminho . $nomeArquivo);
        $imagem = Image::make($arquivo->getRealPath());

        if ($x != 0 && $y != 0) {
            $imagem = $imagem->resize($x, $y);
        }

        $imagem->save($path);
    }
}

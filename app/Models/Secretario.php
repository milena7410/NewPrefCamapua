<?php

namespace PrefCamapua\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Secretario.
 *
 * @package namespace CamaraCamapua\Models;
 */
class Secretario extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['nome', 'email', 'cargo_id', 'descricao', 'imagem','caminho_imagem','ativo'];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function getImagem()
    {
        return asset('images/secretarios/' . $this->imagem);
    }

    public function isAtivo()
    {
        return $this->ativo == '1'? true : false;
    }
}

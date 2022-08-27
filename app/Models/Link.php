<?php

namespace PrefCamapua\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Link.
 *
 * @package namespace PrefCamapua\Models;
 */
class Link extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo', 'target', 'titulo', 'subtitulo', 'url', 'imagem', 'caminho_imagem', 'ativo'];

    public function getImagem()
    {
        return asset($this->caminho_imagem . $this->imagem);
    }

    public function secretarias()
    {
        return $this->belongsToMany(Secretaria::class);
    }

    public function isAtivo()
    {
        return $this->attributes['ativo'] == '1' ? true : false;
    }

    public function isTarget()
    {
        return $this->attributes['target'] == '1' ? true : false;
    }

    public function getTargetName(){
        return $this->attributes['target'] == '1' ? '_blank' : '_self';
    }

}

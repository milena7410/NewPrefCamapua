<?php

namespace PrefCamapua\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class TipoPublicacao.
 *
 * @package namespace PrefCamapua\Models;
 */
class TipoPublicacao extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'tipo_publicacoes';

    protected $fillable = ['tipo', 'ativo','url','tipo_publicacao_id'];

    public function subtipos()
    {
        return $this->hasMany(TipoPublicacao::class);
    }

    public function isAtivo()
    {
        return $this->ativo == '1';
    }

    /**
     * @param string $url
     */
    public function setUrlAttribute($url)
    {
        $this->attributes['url'] = str_slug($url);
    }

}

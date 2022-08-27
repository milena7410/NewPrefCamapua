<?php

namespace PrefCamapua\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Secretaria.
 *
 * @package namespace PrefCamapua\Models;
 */
class Secretaria extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = ['secretaria', 'secretario_id', 'url', 'email', 'ativo'];

    public function secretario()
    {
        return $this->belongsTo(Secretario::class);
    }

    public function isAtivo()
    {
        return $this->ativo == '1' ? true : false;
    }

    public function noticias()
    {
        return $this->belongsToMany(Noticia::class);
    }

}

<?php

namespace PrefCamapua\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Pagina.
 *
 * @package namespace PrefCamapua\Models;
 */
class Pagina extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo', 'conteudo', 'url', 'target', 'ativo', 'pagina_id','secretaria','pagina_interna'];

    public function paginaPrincipal()
    {
        return $this->belongsTo(Pagina::class);
    }

    public function secretarias()
    {
        return $this->belongsToMany(Secretaria::class);
    }

    public function subPaginas()
    {
        return $this->hasMany(Pagina::class)->get();
    }

    public function getAllSubPaginas(){
        return $this->subPaginas()->get();
    }

    public function isAtivo()
    {
        return $this->attributes['ativo'] == '1';
    }

    public function isInterno()
    {
        return $this->attributes['pagina_interna'] == '1';
    }

    public function isTarget()
    {
        return $this->attributes['target'] == '1';
    }

    public function isPrincipal()
    {
        return $this->attributes['pagina_id'] === null;
    }

    public function isPaginaSecretaria()
    {
        return $this->attributes['secretaria'] == '1';
    }

    public function getTargetName()
    {
        return $this->attributes['target'] == '1' ? '_blank' : '_self';
    }

}

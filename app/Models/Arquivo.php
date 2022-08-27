<?php

namespace PrefCamapua\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Arquivo.
 *
 * @package namespace PrefCamapua\Models;
 */
class Arquivo extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['publicacao_id','arquivo','descricao','caminho','mimetype','ativo'];

    public function publicacao()
    {
        return $this->belongsTo(Publicacao::class);
    }

    public function isAtivo()
    {
        return $this->ativo == '1';
    }

    public function getArquivo()
    {
        return $this->caminho.$this->arquivo;
    }

}

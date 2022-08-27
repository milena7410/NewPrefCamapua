<?php

namespace PrefCamapua\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Midia.
 *
 * @package namespace PrefCamapua\Models;
 */
class Midia extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['arquivo','descricao','caminho','mimetype','ativo'];

    public function isAtivo()
    {
        return $this->ativo == '1';
    }

    public function getArquivo()
    {
        return $this->caminho.$this->arquivo;
    }

}

<?php

namespace PrefCamapua\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Categoria.
 *
 * @package namespace PrefCamapua\Models;
 */
class Categoria extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['categoria','ativo'];

    public function isAtivo()
    {
        return $this->ativo == '1';
    }

}

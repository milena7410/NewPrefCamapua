<?php

namespace PrefCamapua\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Entidade.
 *
 * @package namespace PrefCamapua\Models;
 */
class Entidade extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'entidade',
        'email',
        'telefone',
        'rua',
        'numero',
        'bairro',
        'cep',
        'cidade',
        'estado',
        'complemento'
    ];

}
